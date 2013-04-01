#!/usr/bin/php -q
<?php
	# =========================== 
	# 			Yarpt-Repackage v1.0   			
	# ===========================
	#											
	#		Coder 	: K4pT3N					
	#		URL		: www.ExploreCrew.org		
	#		YM		: seorang_kapten			
	#		Twitter	: @jmozac				
	#		FB		: /jmozac					
	#											
	# ===========================

	class package {
		var $dirpath = "/var/cache/apt/archives/";
		
		function cwd(){
			return getcwd();
		}
		function getaptname($filedeb){
			$lim = strpos($filedeb,"-");
			$filename = substr($filedeb,0,$lim);
			return $filename;
		}
		
		function dirlist(){
			$filelist = opendir($this->dirpath);
			while (false !== ($file = readdir($filelist))) { 
				$file = str_replace("_","-",$file);
				$rDebs[] = $this->getaptname($file);
			}
			closedir($filelist);
			return print_r(array_unique($rDebs));
		}
		function repack(){
			$cmd = $_SERVER['argv'][1];
			if($cmd==""){
				$this->dirlist();
				print "\nKetikkan nama file yang akan di backup dari aplikasi yang sudah terinstall diatas\n\nEx: ".$_SERVER['argv'][0]." nama_file\n";
			} else {
				print "Creating archives...\n";
				shell_exec("cd ".$this->dirpath." && tar czf ".$this->cwd()."/".$cmd.".tar.gz ".$cmd."*");
				exit();
			}
			print "\nYarpt-Repack v1.0 | Coded By K4pT3N [www.ExploreCrew.org]\n\n";
		}
	}
	$package = new package;
	$package->repack();
