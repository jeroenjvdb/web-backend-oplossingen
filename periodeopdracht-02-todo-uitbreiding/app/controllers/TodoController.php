<?php
	Class TodoController extends BaseController{
		public function getTodo()
		{
			$items = Auth::user()->items;
			$done = array();
			$todo = array();
			foreach ($items as $item) {
			
				if(!$item['is_archived']){
						if($item['done']){
							$done[] = $item;
						}
						else {
							$todo[] = $item;
						}
					}
				}
			

			/*var_dump($done);
			var_dump($todo);*/

			return View::make('todo', array(
					'done' => $done,
					'todo' => $todo
				));
		}
		



		public function getNew()
		{
			return View::make('newTodo');
		}

		public function postNew()
		{
			$rules = array(
				'description' => 'required'
				);
			$validator = Validator::make(Input::all(), $rules);

			if($validator->fails())
			{
				echo 'error';
				return Redirect::route('newTodo')->withErrors('zijn we iets vergeten?');
			}

			$item = new Item;
			$item->user_id 	=	Auth::id();
			$item->name 	=	Input::get('description');
			$item->done 	= 	false;
			$item->is_archived = false;
			$item->save();
			return Redirect::route('todo')->with('successes', array('new item "' . $item->name . '" toegevoegd'));
		}

		public function activate($id)
		{
			$item = Item::find($id);
			if(Auth::user()->id == $item['user_id']){
				
				echo $item->done;
				$newDone = abs($item->done - 1);
				echo $newDone;
				$item->done = abs($item->done - 1);
				echo $item->done;
				$item->save();
				return Redirect::route('todo');
			} else {
				return Redirect::route('todo')->with('errors', array(
						'gelieve enkel je eigen items te doen'
					));
			}

			
		}

		public function delete($id)
		{
			$item = Item::find($id);
			if (Auth::user()->id == $item['user_id']) {
				# code...
				
				$item->is_archived = abs($item->is_archived - 1);
				$item->save();

				return Redirect::route('todo')->with('successes', array( 'het item "' . $item->name . '" werd succesvol verwijderd' ));


			} else {
				return Redirect::route('todo')->with('errors',array(
						'gelieve enkel je eigen items te verwijderen'
					));
			}

		}
	}

?>