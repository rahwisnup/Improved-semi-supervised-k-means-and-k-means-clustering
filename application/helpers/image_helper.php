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
if ( ! function_exists('base64_image'))
{
    function base64_image ( $image_path, $image_height = null, $image_width = null )
	{
		// Get header response code from target path
		$segments = get_headers( $image_path );
		$error_code = substr( $segments[0], 9, 3 );
			
		if( $error_code != "404" )
		{
			// Get type of file image from target path
			$type = pathinfo( $image_path, PATHINFO_EXTENSION );
			
			// Read image binary and convert into string
			$data = file_get_contents( $image_path );
			
			// Is image height and width set?
			if( isset( $image_height ) && isset( $image_width ) )
			{
				$base64 = 'data:image/' . $type . ';base64,' . base64_encode( $data ) . '" height="' . $height . '" width="' . $width . '"';
			}
			else
			{
				$base64 = 'data:image/' . $type . ';base64,' . base64_encode( $data );
			}
		}
		else
		{
			// Show default image if function failed find image location
			// Change this path according your default image location 
			$image_path = "http://api.smuet.net/foto_user/no.jpg";
			$type = pathinfo( $image_path, PATHINFO_EXTENSION );
			
			$data = file_get_contents( $image_path );
			$base64 = 'data:image/' . $type . ';base64,' . base64_encode( $data );
		}
		return $base64;
	}
}


/* End of file image_helper.php */
/* Location: ./application/helpers/image_helper.php */