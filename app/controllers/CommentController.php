<?php

class CommentController extends BaseController {

	public function putComment()
	{

		if(Input::server('REQUEST_METHOD')=='POST'){

			$rules=[
			'pseudo'=>'required',
			'email'=>'required|email',
			'message'=>'required',
			];

			$validator=Validator::make(Input::all(), $rules);
			

			if($validator->fails()){
				return Redirect::back()->withInput()->withErrors($validator);

			}else{

				$apiKey = Config::get('app.akismet_api_key');
				$siteURL = Config::get('app.url');



		$args = array(
			'pseudo'   => FILTER_SANITIZE_SPECIAL_CHARS,
			'email'   => FILTER_SANITIZE_SPECIAL_CHARS,
			'message'   => FILTER_SANITIZE_SPECIAL_CHARS,
			'post_id'   => FILTER_VALIDATE_INT,
			);

		$myinputs = filter_input_array(INPUT_POST, $args);


				$akismet = new Akismet($siteURL ,$apiKey);
				$akismet->setCommentAuthor($myinputs['pseudo']);
				$akismet->setCommentAuthorEmail($myinputs['email']);
				$akismet->setCommentContent($_POST['message']);
				// $akismet->setPermalink($siteURL);


				$comment = new Comment;
				$comment->email = $myinputs['email'];
				$comment->pseudo = $myinputs['pseudo'];
				$comment->content = $_POST['message'];
				$comment->post_id = $myinputs['post_id'];

				if($akismet->isCommentSpam()){
					$comment->spam = 1;
				}else{
					$comment->spam = 2;
				}


				$comment->save();
				$data['email']=$myinputs['email'];

				// Mail::send('emails.newComment', $data, function($message)
				// {
				// 	$message->to('julien_binet@hotmail.fr', 'julien')->subject('Nouveau commentaire !!!');
				// });

				Session::flash('message', "<p style='color:aqua;'>Merci pour votre commentaire.</p>");

				return Redirect::back();
				
			}

		}

	}


}
