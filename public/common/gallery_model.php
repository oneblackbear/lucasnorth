<?php
class Gallery {
	
	var $active_directory = false;
	var $root_directory = false;
	var $default_directory = "GALLERIES/";

	public function Gallery(){
		$file = __FILE__;
		$this->root_directory = substr($file, 0, strrpos($file, "models/") );
		$this->active_directory = $this->root_directory . $this->default_directory;		
	}	
	
	public function fetch($new_dir=false, $files_only = false, $directory_only=false){
		if($new_dir) $this->active_directory = $this->root_directory . $new_dir;		
		if(is_dir($this->active_directory)){
			$tree = array();
			foreach(glob($this->active_directory ."*") as $count => $file)	{				
				if(is_dir($file))$dir = "directory";
				else $dir = "file";
				if($directory_only && is_dir($file)) 
					$tree[$count] = array('name'=>$this->convert_path_to_name($file), 'path'=>$file, 'size'=>filesize($file), 'is_dir'=> $dir );
				elseif(!$directory_only && ( (!$files_only && is_dir($file) ) || ($files_only && is_file($file) ) ) )
					$tree[$count] = array('name'=>$this->convert_path_to_name($file), 'path'=>$file, 'size'=>filesize($file), 'is_dir'=> $dir );
			}
			return $tree;
		} else return false;
	}
	
	public function random_image(){
		$dir_list = $this->fetch();
		$to_use = array_rand($dir_list);
		$new_dir = $dir_list[$to_use];
		$files = $this->fetch($new_dir['path']."/", true);
		$to_use = array_rand($files);
		return $files[$to_use]['path'];
	}
	
	protected function convert_path_to_name($path){
		$name = str_ireplace($this->active_directory, "", $path);
		if(is_dir($path)) return str_replace("_", " ", $name);
		else return str_replace("_", " ", substr($name, 0, strrpos($name, ".") ) );
	}
	
}

?>