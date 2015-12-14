<?php
namespace App\Http\Controllers;
date_default_timezone_set("Asia/Kolkata"); 

use Illuminate\Http\Request;
use Validator;
use DB;
use Hash;
use App\User;
use App\Task;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	public function signupForm()
	{
		return view('signup');
	}
	public function about()
	{
		return view('about');
	}
	public function signup(Request $request)
	{
		$data = array(
			'created_at'=>date('Y/m/d'),
			'remember_token'=>$request->_token,
			'name' =>$request->name,
			'email' =>$request->email,
			'password' =>$request->password,
			'profession' =>$request->profession
			);
		

		$validator = Validator::make(
			array(
				'name' =>$request->name,
				'email' =>$request->email,
				'password' =>$request->password,
				'profession' =>$request->profession),
			array(
				'name' =>'required',
				'email' =>'required|email',
				'password' =>'required|alpha_num|min:6|max:8'
				
				)
			);
		if($validator->fails())
		{
			return redirect('Signup')
			->withErrors($validator)
			->withInput();
		}
		else{

			$users = new User;
			$users->remember_token=$request->_token;
			$users->name= $request->name;
			$users->email= $request->email;
			$users->password= Hash::make($request->password);
			$users->profession= $request->profession;

			$email = User::where('email',$request->email)->get();;
			if(count($email) == 0)
			{

				if($users->save())
				{
					return redirect('Signup')->with('success','Registered Successfully! Now Login And Manage Your Tasks');
				}
				else
				{
					return redirect('Signup')->with('error','Something is wrong! Try Again');

				}

			}
			else{
				return redirect('Signup')->with('error','Email Already Exist');
			}
		}
	}

	public function loginForm()
	{
		if(Auth::check())
		{
			return view('home');
		}
		else
		{
			return view('login');
		}
	}
	public function login(Request $request)
	{
		$validator = Validator::make(
			array(
				'email' =>$request->email,
				'password' =>$request->password
				),
			array(
				'email' =>'required|email',
				'password' =>'required|alpha_num|min:6|max:8'
				)
			);
		if($validator->fails())
		{
			return redirect('Login')
			->withErrors($validator)
			->withInput();
		}
		else
		{
			$user = array('email' =>$request->email,'password' =>$request->password);
			if(Auth::attempt($user))
			{
				return redirect()->intended('home');
			}
			else{
				return redirect()->intended('Login')->with('error','Invalid Email Or Password');

			}
		}
	}
	public function home()
	{
		return view('home');
	}

	public function addTaskForm()
	{
		return view('add-task');
	}

	public function addTask(Request $request)
	{
		$validator = Validator::make(
			array(
				'taskTitle' =>$request->taskTitle,
				'task' =>$request->task
				),
			array(
				'taskTitle' =>'required|min:5|max:50',
				'task' =>'required|min:10|max:500'
				)
			);
		if($validator->fails())
		{
			return redirect('addTask')
			->withErrors($validator)
			->withInput();
		}
		else
		{
			$task = new Task;
			$task->email= Auth::user()->email;
			$task->task_title= $request->taskTitle;
			$task->task= $request->task;

			if($task->save())
			{
				return redirect('addTask')->with('success','Added Successfully!');
			}
			else
			{
				return redirect('addTask')->with('error','Something is wrong! Try Again');

			}

		}


	}
	public function allTask()
	{
		$tasks = Task::where('email',Auth::user()->email)->paginate(1);
		$tasks->setPath('allTask');
		return view('allTask')->with('tasks',$tasks);

	}
	public function deleteTask($id) {
		$task = Task::find($id);
		$task->delete();
		return redirect('allTask')->with('message', 'Successfully deleted!');   

	}


	public function profile()
	{
		$users = User::where('email',Auth::user()->email)->get();
		return view('edit-profile')->with('users',$users);

	}
	public function editProfile(Request $request)
	{
		// $user = new User;
		// $user->name = $request->name;
		// $user->profession = $request->profession;
		// $user->address = $request->address;
		// $user->contact = $request->contact;
		if(User::where('email',Auth::user()->email)->update(array('name'=>$request->name,'profession'=>$request->profession
			,'address'=>$request->address,'contact'=>$request->contact)))
		{
			return redirect('edit-profile')->with('message', 'Successfully deleted!');   

		}
		
	}


	public function logout()
	{
		Auth::logout();
		return redirect('Login')->with('success','Successfully Signout');

	}

	public function sendMailForm()
	{
		return view('email');
	}
	public function sendMail(Request $request)
	{
		

	}

}
