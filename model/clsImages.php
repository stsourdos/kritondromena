<?php 
	class Image extends KdObject{
		public $keymap = array(
			'ID'			=> 'ID',
        	'TITLE'			=> 'TITLE',
        	'EVENTID'		=> 'EventID',
        	'LOCATION'		=> 'Location',
        	'DESCRIPTION'	=> 'Description'
    	);
			
		public function __construct() {
			$this->tablename = 'Images';
			$this->table_pk  = 'ID';
    	}
		
    	public function create( $title, $description, $location, $eventID ) {
    		/**@todo this is unsafe**/
			$con = get_mysql_connection();
			$img = new Image();
			$img->data['TITLE'] 		= $title;
			$img->data['DESCRIPTION'] 	= $description;
			$img->data['LOCATION'] 		= $location;
			$img->data['EVENTID']		= $eventID;
			
			$img_result = $img->save();
			if(!$img_result)
				return false;
			else
				return $img->id;
        }		
	}
?>
