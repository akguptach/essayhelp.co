<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Subjects;
use App\Models\Study_labels;
use App\Models\Task_types;
use App\Models\Level_study;
use App\Models\Grades;
use App\Models\Referencing;
use App\Models\Website;
use App\Models\Orders;
use Response;
use Validator;
use Hash;

class OrderController extends Controller
{
	public function index()
	{
		$data['subjects']   =   Subjects::orderBy('subject_name', 'ASC')->get()->toArray();
		//$data['topics']     =   Study_labels::orderBy('id','desc')->get()->toArray();
		$data['task_types'] =   Task_types::where('website_type', 'Essay')->orderBy('id', 'desc')->get()->toArray();
		$data['levels']     =   Level_study::where('website_type', 'Essay')->orderBy('id', 'desc')->get()->toArray();
		$data['grades']     =   Grades::orderBy('id', 'desc')->get()->toArray();
		$data['referencings']     =   Referencing::orderBy('id', 'desc')->get()->toArray();
		if (session()->has('attachment')) {
			session()->forget('attachment');
		}
		return view('order', $data);
	}
	public function checkprice(Request $request)
	{

		$validator = Validator::make($request->all(), [
			'subject_id' 			=> 'required|numeric',
			'referencing_style_id'  => 'required|numeric',
			'task_type_id' 			=> 'required|numeric',
			'no_of_words' 			=> 'required|numeric',
			'studylabel_id' 		=> 'required|numeric',
			'grade_id' 				=> 'required|numeric',

		]);
		if ($validator->fails()) {
			return Response::json(array('success' => 'false', 'price' => array(), 'message' => $validator->errors()));
		}
		$website_id = env('WEBSITE_ID');;
		$subject_id			 = $request->subject_id;
		$referencing_style_id = $request->referencing_style_id;
		$task_type_id		 = $request->task_type_id;
		$no_of_words		 = $request->no_of_words;
		$labelofstudy_id		 = $request->studylabel_id;
		$grade_id			 = $request->grade_id;
		$delivery_date			 = $request->delivery_date;


		$websiteArr      =   Website::where('id', $website_id)->first()->toArray(); //%
		$subjectArr      =   Subjects::where('id', $subject_id)->first()->toArray();
		$referencingArr  =   Referencing::where('id', $referencing_style_id)->first()->toArray();
		$labelofstudyArr   =   Level_study::where('id', $labelofstudy_id)->first()->toArray(); //%
		$task_typeArr    =   Task_types::where('id', $task_type_id)->first()->toArray(); //%
		$gradeArr        =   Grades::where('id', $grade_id)->first()->toArray(); //%

		if ($no_of_words < $websiteArr['no_words']) {
			$no_of_words = $websiteArr['no_words'];
		}
		//echo $no_of_words.'=='.$websiteArr['no_words'];

		$total1 = $subjectArr['price'] + (($no_of_words - $websiteArr['no_words']) * $subjectArr['additional_word_rate']);

		$total1 = $total1 + ($total1 * $websiteArr['subject_price'] / 100);



		//echo $websiteArr['price'].'=='.$studylabelArr['price'].'=='.$task_typeArr['price'].'=='.$gradeArr['price'];
		//echo '<br>';
		$total_percent = $labelofstudyArr['price'] + $task_typeArr['price'] + $gradeArr['price'];

		$total = $total1 + round(($total1 * $total_percent) / 100);


		$arrWP = explode(',', $websiteArr['website_price']);

		$total2 = ($total * $arrWP[0]) / 100;



		$arrP = array();
		$arrP['hour1'] = 100;
		$arrP['delivery_date'] = $delivery_date;

		$arrP['hour2'] = $total2 . $websiteArr['currency'];
		if ($delivery_date == '12 hours') {
			$str = '<li class="col-12" style="height: 60px;"><input class="delivery_at" type="radio" value="12 hours" name="custom_date_at" rel="' . $websiteArr['currency_sign'] . $total2 . '" checked /><label for="custom_date_at" >12 Hours<br>' . $websiteArr['currency_sign'] . $total2 . '</label></li>';

			$arrP['delivery_date_price'] = $websiteArr['currency_sign'] . $total2;
		} else {
			$str = '<li class="col-12" style="height: 60px;"><input class="delivery_at" type="radio" value="12 hours" name="custom_date_at" rel="' . $websiteArr['currency_sign'] . $total2 . '" /><label for="custom_date_at" >12 Hours<br>' . $websiteArr['currency_sign'] . $total2 . '</label></li>';
		}
		if ($delivery_date == 'NA') {
			$arrP['delivery_date_price'] = 0;
		}

		$j = 1;
		for ($i = 1; $i < 25; $i++) {
			$total1 = 0;
			/*if($j==1)
			{
				$total1=round(($total*$arrWP[1])/100);
			}elseif($j==2)
			{
				$total1=round(($total*$arrWP[2])/100);
			}elseif($j==3)
			{
				$total1=round(($total*$arrWP[3])/100);
			}else{*/
			$total1 = round(($total * $arrWP[$j]) / 100);
			//}

			if ($j == 22) {
				$str .= '<li class="col-2" style="height: 82px;margin-top:2px;"><input class="delivery_at" type="radio" value="30 days" name="custom_date_at" rel="' . $websiteArr['currency_sign'] . $total1 . '" style="height:80px;" checked /><label for="custom_date_at" >
					<span style="float: left;width: 100%;font-size: 12px;">Delivered in</span>
					<span style="float: left;width: 100%;font-weight: bold;font-size: 20px;">30 Days</span>
					<span style="float: left;width: 100%;font-size:14px;color:#0a58ca;">' . $total1 . $websiteArr['currency_sign'] . '</span>
					</label></li>';
				$arrP['delivery_date_price'] = $websiteArr['currency_sign'] . $total1;
			} elseif ($j == 23) {

				$str .= '<li class="col-2" style="height: 82px;margin-top:2px;"><input class="delivery_at" type="radio" value="45 days" name="custom_date_at" rel="' . $websiteArr['currency_sign'] . $total1 . '" style="height:80px;" checked /><label for="custom_date_at" >
					<span style="float: left;width: 100%;font-size: 12px;">Delivered in</span>
					<span style="float: left;width: 100%;font-weight: bold;font-size: 20px;">45 Days</span>
					<span style="float: left;width: 100%;font-size:14px;color:#0a58ca;">' . $total1 . $websiteArr['currency_sign'] . '</span>
					</label></li>';
				$arrP['delivery_date_price'] = $websiteArr['currency_sign'] . $total1;
			} elseif ($j == 24) {

				$str .= '<li class="col-2" style="height: 82px;margin-top:2px;"><input class="delivery_at" type="radio" value="60 days" name="custom_date_at" rel="' . $websiteArr['currency_sign'] . $total1 . '" style="height:80px;" checked /><label for="custom_date_at" >
					<span style="float: left;width: 100%;font-size: 12px;">Delivered in</span>
					<span style="float: left;width: 100%;font-weight: bold;font-size: 20px;">60 Days</span>
					<span style="float: left;width: 100%;font-size:14px;color:#0a58ca;">' . $total1 . $websiteArr['currency_sign'] . '</span>
					</label></li>';
				$arrP['delivery_date_price'] = $websiteArr['currency_sign'] . $total1;
			} else {
				$date = date("Y-m-d", strtotime(date('Y-m-d') . " +$i days"));

				//M(D)
				$dd = date("d", strtotime(date('Y-m-d') . " +$i days"));
				$D1 = date("D", strtotime(date('Y-m-d') . " +$i days"));
				if ($delivery_date == $date) {

					$str .= '<li class="col-2" style="height: 82px;margin-top:2px;"><input class="delivery_at" type="radio" value="' . $date . '" name="custom_date_at" rel="' . $total1 . ' ' . $websiteArr['currency_sign'] . '" style="height:80px;" checked /><label for="custom_date_at" >
					<span style="float: left;width: 100%;font-size: 12px;">' . $D1 . '</span>
					<span style="float: left;width: 100%;font-weight: bold;font-size: 20px;">' . $dd . '</span>
					<span style="float: left;width: 100%;font-size:14px;color:#0a58ca;">' . $total1 . $websiteArr['currency_sign'] . '</span>
					</label></li>';
					$arrP['delivery_date_price'] = $websiteArr['currency_sign'] . $total1;
				} else {

					$str .= '<li class="col-2" style="height: 82px;margin-top:2px;"><input class="delivery_at" type="radio" value="' . $date . '" name="custom_date_at" rel="' . $websiteArr['currency_sign'] . $total1 . '" style="height:80px;" />
					<label for="custom_date_at" >
					<span style="float: left;width: 100%;font-size: 12px;">' . $D1 . '</span>
					<span style="float: left;width: 100%;font-weight: bold;font-size: 20px;">' . $dd . '</span>
					<span style="float: left;width: 100%;font-size:14px;color:#0a58ca;">' . $websiteArr['currency_sign'] . $total1 . '</span>
					</label></li>';
					if ($delivery_date != 'NA' && $delivery_date != '12 hours') {
						$arrP['delivery_date_price'] = $websiteArr['currency_sign'] . $total1;
					}
				}
			}



			$j++;
		}



		$arrP['custom_date'] = $str;
		return Response::json(array('success' => 'true', 'price' => $arrP, 'price1' => $websiteArr['currency_sign'] . $total1));
	}

	/*public function processAttachment(Request $request)
	{
		if (session()->has('attachment')) {
			session()->forget('attachment');
		}
		$type = $request->type;
		$attachment = $request->attachment;
		$data = [];
		if ($type == 'url') {
			$data['type'] = $type;
			$data['attachment'] = $attachment;
			session()->put('attachment', $data);
		}
		if ($type == 'file') {
			$attachmentList = [];
			for ($i = 0; $i < $request->total_file; $i++) {
				$key = 'attachment_' . $i;
				$attachment = $request->$key;
				$imageName = time() . '.' . $attachment->getClientOriginalName();
				$path = Storage::disk('s3')->put('student/assignment', $attachment);
				$path = Storage::disk('s3')->url($path);
				$attachmentList[] = $path;
			}
			$data['type'] = $type;
			$data['attachment'] = $attachmentList;
			session()->put('attachment', $data);
		}
		if (session()->has('attachment')) {
			return session('attachment');
		}
	}*/


	public function processAttachment(Request $request)
	{


		if (session()->has('attachment')) {
			session()->forget('attachment');
		}
		$type = $request->type;
		$attachment = $request->attachment;
		$data = [];
		if ($type == 'url') {
			$data['type'] = $type;
			$data['attachment'] = $attachment;
			session()->put('attachment', $data);
		}
		if ($type == 'file') {
			$attachmentList = [];
			for ($i = 0; $i < $request->total_file; $i++) {
				$key = 'attachment_' . $i;
				$attachment = $request->$key;
				$attachmentName = time() . '.' . $attachment->getClientOriginalExtension();
				$attachment->move(public_path('images/uploads/attachment/'), $attachmentName);
				$attachmentList[] = env('APP_URL', '/') . 'images/uploads/attachment/' . $attachmentName;
			}
			$data['type'] = $type;
			$data['attachment'] = $attachmentList;
			session()->put('attachment', $data);
		}
		if (session()->has('attachment')) {
			return session('attachment');
		}
	}

	public function create(Request $request)
	{

		$website_id = env('WEBSITE_ID');

		$validator = Validator::make($request->all(), [

			'title' => 'required',
			'task' => 'required',
			'subject_id' => 'required',
			'referencing_style_id' => 'required',
			'task_type_id' => 'required',
			'no_of_words' => 'required',
			'studylabel_id' => 'required',
			'grade_id' => 'required',
			'delivery_date' => 'required',
			'delivery_price' => 'required',
			//'taskFile' => 'required|mimes:pdf,doc,zip,jpg,png|max:5120',



		]);

		if ($validator->fails()) {

			return $this->sendError('Validation Error.', $validator->errors(), 422);
		}

		$order = new Orders();

		// Store the file in storage\app\public folder
		//$file = $request->file('taskFile');
		//$fileName = $file->getClientOriginalName();
		//$filePath = $file->store('uploads/easy_help/', 'public');

		// Store file information in the database
		//$uploadedFile = new UploadedFile();
		//$uploadedFile->filename = $fileName;
		//$uploadedFile->original_name = $file->getClientOriginalName();
		//$uploadedFile->file_path = $filePath;

		$order->title = $request->title;

		$order->task = $request->task;

		$order->subject_id = $request->subject_id;
		$order->website_id = $website_id;
		$order->referencing_style_id = $request->referencing_style_id;
		$order->task_type_id = $request->task_type_id;
		$order->no_of_words = $request->no_of_words;
		$order->grade_id = $request->grade_id;
		$order->studylabel_id = $request->studylabel_id;
		$order->delivery_date = $request->delivery_date;

		$arrPrice = preg_match('/^(\D+)(\d+)$/', $request->delivery_price, $match);
		$order->price = $match[2];
		$order->currency_code = $match[1];

		$websiteArr      =   Website::where('id', $website_id)->first()->toArray();




		$order->student_id = Auth::id();


		$order->save();
		$order_number = $websiteArr['order_prefix'] . str_pad($order->id, 3, 0, STR_PAD_LEFT);


		DB::table('orders')->updateOrInsert(
			[
				'id' => $order->id
			],
			[
				'id' => $order->id,
				'order_number' => $order_number
			]
		);


		//$token = Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]);
		return response()->json(
			[
				'status' => 'order added successfully.',
				'order_id' => \Crypt::encrypt($order->id)
			]
		);
	}

	public function transactions()
	{

		$user_id = Auth::id();
		$arrD = DB::table('orders')
			->join('subjects', 'subjects.id', '=', 'orders.subject_id')
			->join('websites', 'websites.id', '=', 'orders.website_id')
			->join('task_types', 'task_types.id', '=', 'orders.task_type_id')
			->join('level_study', 'level_study.id', '=', 'orders.studylabel_id')
			->join('grades', 'grades.id', '=', 'orders.grade_id')
			->join('referencing_style', 'referencing_style.id', '=', 'orders.referencing_style_id')
			->select('orders.*', 'subjects.subject_name', 'websites.website_name', 'task_types.type_name', 'level_study.level_name', 'grades.grade_name', 'referencing_style.style')
			->where('orders.student_id', $user_id)
			->orderBy('orders.id', 'desc')
			->get();

		$data['orders'] = json_decode(json_encode($arrD), true);

		return view('transactions', $data);
	}
	public function refer_friend()
	{
		$data = array();
		return view('refer_friend_individual', $data);
	}
	public function statements()
	{
		$data = array();
		return view('statements', $data);
	}
}