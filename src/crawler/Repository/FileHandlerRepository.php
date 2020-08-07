<?php
namespace crawler\Repository;

interface IReadTxtFile
{
	public function ReadFile($FileName);
}

interface IWriteJsonFile
{
	public function WriteFile($ResponseObject, $FileName);
}

class FileHandler implements IReadTxtFile, IWriteJsonFile
{
	public function ReadFile($filename)
	{
		try
		{
            $response = array();
            $i=0;
            if(file_exists($filename))
            {
                $myfile = fopen($filename, "r") or die("Unable to open file!");
                while(!feof($myfile)) 
                {
                    $response['name'][$i]=stripcslashes(fgets($myfile));
                    $i++;
                }
                fclose($myfile);
            }
            else
            {
                echo "Invalid path! Current working directory is: ".getcwd()."\n";
            }
			
			
			if($i > 0)
			{
				$response["status_code"] = 200;
				$response["status"] = "OK";
			}
			return $response;
		}
		catch(Exception $ex)
		{
			//Log exception to DB/file
		}	
	}

	public function WriteFile($ResponseObject, $FileName)
	{
		try
		{
			$fp = fopen($FileName, 'w');
			fwrite($fp, $ResponseObject);
			fclose($fp);
		}
		catch(Exception $ex)
		{
			//Log exception to DB/file
		}		
	}
}

?>