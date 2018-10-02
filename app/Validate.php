<?php

namespace App;

use  Symfony\Component\HttpFoundation\File\UploadedFile as SymFile;


Class VALIDATE {

	static $TYPES = [ 'csv' =>

		                  [
		                  	'application/csv',

	                        'application/excel',

	                        'application/vnd.ms-excel',

	                        'application/vnd.msexcel',

		                    'application/x-excel',

	                        'text/csv',

	                        'text/anytext',

	                        'text/comma-separated-values']

	];

	static public function fileType($file){
		$type = 'csv';
		if ( ($file->SymFile::getClientSize()>0) ){

			if (in_array($file->SymFile::getClientMimeType(), self::$TYPES[$type])){

				return true;

			}
			elseif( ($file->SymFile::getClientOriginalExtension() === $type) &&
			        ($file->SymFile::getClientMimeType() === 'text/plain') ){
				return true;
			}
		}
		return false;
	}

}