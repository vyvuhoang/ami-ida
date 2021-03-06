<?php
/*
	store data to csv
*/

Class CSVT{
	private $folder_root = "csv";
	private $folder_download = "download";
	private $file_name = "data_entry.csv";
	private $datalist = array();

	public function export_csv($reg_studio_slug = '', $y = '', $m, $list = array()){
		if(empty($list)){
			return;
		}
		$this->datalist = $list;
		$this->write_file($this->create_month($reg_studio_slug, $y, $m));
	}
	public function create_month($reg_studio_slug, $y, $m){
    $listd = array();
    $time = time();
    $listd['P'] = $reg_studio_slug;
		$listd['Y'] = $y;
		$listd['m'] = $m;
		return $this->check_mdir($listd);
	}
	public function check_mdir($listd = array()){
		if(!@is_dir($this->folder_root)){
			mkdir($this->folder_root, 0777);
		}
		if(!empty($listd)){
			if(!(@is_dir($this->folder_root."/".$listd['P']))){
				mkdir($this->folder_root."/".$listd['P'], 0777);
      }
      if(!(@is_dir($this->folder_root."/".$listd['P']."/".$listd['Y']))){
				mkdir($this->folder_root."/".$listd['P']."/".$listd['Y'], 0777);
			}
			if(!(@is_dir($this->folder_root."/".$listd['P']."/".$listd['Y']."/".$listd['m']))){
        mkdir($this->folder_root."/".$listd['P']."/".$listd['Y']."/".$listd['m'], 0777);
				$file = fopen($this->folder_root."/".$listd['P']."/".$listd['Y']."/".$listd['m']."/".$this->file_name,"a");
        // fputcsv($file,array(
				// 	'NO',
				// 	'申込み日時',
				// 	'お名前',
				// 	'体験予約日',
				// 	'開始時間',
				// 	'レッスン名',
				// 	'インストラクター',
				// 	'経由',
				// 	'予約確認電話',
				// 	'- 担当',
				// 	'2日前確認電話',
				// 	'- 担当',
				// 	'ステータス',
				// 	'備考・メモ'
        //   )
        // );
        fclose($file);
			}
    }
		return $this->folder_root."/".$listd['P']."/".$listd['Y']."/".$listd['m'];
	}
	public function write_file($file_path){
		if(empty($this->datalist)){
			return;
		}
		$file = fopen($file_path."/".$this->file_name,"w");
		// echo '<pre class="preanhtn">'; print_r($this->datalist); echo '</pre>';
		foreach ($this->datalist as $line){
			fputcsv($file,$line);
		}
		fclose($file);
	}

	//export csv all
	public function export_csv_all($reg_studio_slug = '', $list = array()){
		if(empty($list)){
			return;
		}
		$this->datalist = $list;
		$this->write_file($this->create_month_all($reg_studio_slug));
	}
	public function create_month_all($reg_studio_slug){
    $listd = array();
    $listd['P'] = $reg_studio_slug;
		return $this->check_mdir_all($listd);
	}
	public function check_mdir_all($listd = array()){
		if(!@is_dir($this->folder_root)){
			mkdir($this->folder_root, 0777);
		}
		if(!empty($listd)){
			if(!(@is_dir($this->folder_root."/".$listd['P']))){
				mkdir($this->folder_root."/".$listd['P'], 0777);
      }
    }
		return $this->folder_root."/".$listd['P'];
	}

	public function download_csv(){
		if(!(@is_dir($this->folder_root))){
			return;
		}
		$listd = array();
		$time = time();
		$listd['Y'] = date('Y',$time);
		$listd['m'] = date('m',$time);
		$list_folder = scandir($this->folder_root."/".$listd['Y'],1);
		if(@is_file($this->folder_root."/".$this->folder_download."/".$this->file_name)){
			unlink($this->folder_root."/".$this->folder_download."/".$this->file_name);
		}else{
			if(!(@is_dir($this->folder_root."/".$this->folder_download))){
				mkdir($this->folder_root."/".$this->folder_download);
			}
		}

		/*
		setup header csv for download
		*/
		$ar = array(array("title","url","お名前","ふりがな","年齢","E-MAIL","最終学歴","TEL","住所","性別","備考","日付"));
		$this->datalist = $ar;
		$this->write_file($this->folder_root."/".$this->folder_download);

		if(in_array($listd['m'],$list_folder)){

			if(intval($list_folder[1]) > 0){
				$data_pre = $this->read_file($this->folder_root."/".$listd['Y']."/".$list_folder[1]."/".$this->file_name);
			}else{
				if(@is_dir($this->folder_root."/".($listd['Y']-1))){
					$list_folder_pre = scandir($this->folder_root."/".($listd['Y']-1),1);
					$data_pre = $this->read_file($this->folder_root."/".($listd['Y']-1)."/".$list_folder_pre[0]."/".$this->file_name);
				}
			}
			$this->datalist = $data_pre;
			$this->write_file($this->folder_root."/".$this->folder_download);

			$data_now = $this->read_file($this->folder_root."/".$listd['Y']."/".$listd['m']."/".$this->file_name);
			$this->datalist = $data_now;
			$this->write_file($this->folder_root."/".$this->folder_download);
		}else{
			if(intval($list_folder[0]) > 0){
				$data_pre = $this->read_file($this->folder_root."/".$listd['Y']."/".$list_folder[0]."/".$this->file_name);
			}else{
				$list_folder_pre = scandir($this->folder_root."/".($listd['Y']-1),1);
				$data_pre = $this->read_file($this->folder_root."/".($listd['Y']-1)."/".$list_folder_pre[0]."/".$this->file_name);
			}
			$this->datalist = $data_pre;
			$this->write_file($this->folder_root."/".$this->folder_download);
		}
		return $this->folder_root."/".$this->folder_download."/".$this->file_name;
	}
	public function read_file($file_path){
		$return = array();
		if(!(@is_file($file_path))){
			return;
		}
		$list_data = array();
		$file_handle = fopen($file_path, 'r');
		$size = filesize($file_path)+1;
		while(!feof($file_handle)){
			$a = fgetcsv($file_handle, $size);
			if(!empty($a)){
				$return[] = $a;
			}
		}
		fclose($file_handle);
		return $return;
	}

};
// echo '<meta charset="utf-8">';
// $newcsv = new CSVT();
// $pathdownload = $newcsv->download_csv();
?>