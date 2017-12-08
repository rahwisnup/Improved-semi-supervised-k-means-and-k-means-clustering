<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter Image Helpers
 *
 * @package		Custom Image Proses for CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		BPTIK Cupuz
 * @link		-
 */

// ------------------------------------------------------------------------

/**
 * Generates base64 encode image
 *
 * @access	public
 * @param	string image path
 * @param	integer image height
 * @param	integer image width
 * @return	string image decode
 */
if ( ! function_exists('base64_file'))
{
    function base64_file ( $file_path )
	{
		// Get header response code from target path
		$segments = get_headers( $file_path );
		$error_code = substr( $segments[0], 9, 3 );
			
		if( $error_code != "404" )
		{
			// Get type of file image from target path
			$type = 'octet-stream';
			
			// Read image binary and convert into string
			$data = file_get_contents( $file_path );
			
			// Is image height and width set?
			
			$base64 = 'data:application/' . $type . ';base64,' . base64_encode( $data );
			
		}
		else
		{
			// Show default image if function failed find image location
			// Change this path according your default image location 
			$file_path = "http://api.smuet.net/materi/21920141316-Flash Mob_CityInvasion_ Indonesia _ Tracking_idwp.xlsx";
			$type = pathinfo( $file_path, PATHINFO_EXTENSION );
			
			$data = file_get_contents( $file_path );
			$base64 = 'data:application/' . $type . ';base64,' . base64_encode( $data );
		}
		return $base64;
	}
}


/* End of file image_helper.php */
/* Location: ./application/helpers/image_helper.php */