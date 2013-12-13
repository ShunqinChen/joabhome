<?php

/*
-- 
Additional functions for wepixels Admin Panel Framework 
Created by : Anggun Pribadi
Website : plus62.me / wepixels.com
Version : 1.0.0
--
*/


/* 
Function  wpx_fields()

Description	: Generate the markup of options fields, with array parameter as list of fields.
			  This function will return an array with two elements, a menu markup and fields list markup.
Since		: Version 1.0.0
*/
function wpx_fields( $options, $option_name ){

	$optlive = get_option($option_name);
	$menu = '';
	$output = '';
	$panel['option-list-1'] = '';
	$panel['option-list-2'] = '';
	$i=1;
	foreach( $options as $value ){

		$class = isset($value['class']) ? $value['class'] : '' ;
		
		if ( $value['type'] != 'info' && $value['type'] != 'heading' && $value['type'] != 'open-tab' && $value['type'] != 'close-tab' && $value['type'] != 'check' && $value['type'] != 'hr' ){
			$val = isset($optlive[$value['id']]) ? $optlive[$value['id']] : $value['std'];
			$output .= '<p class="'. $value['type']. '-style">';
			$output .= '<label class="wpx-field-label" for="' . $value['id'] . '">'. $value['name'] . '</label><br/>'; 
		} 

		switch ( $value['type'] ){

			case 'text':

				$output .= '<input type="text" id="'. $value['id'] .'" name="' . $value['id'] . '" value="'. $val .'" />';

			break;

			case 'select':

				$output .= '<select id="'. $value['id'] .'" name="' . $value['id'] . '" value="'. $val .'" >';
				foreach ( $value['options'] as $option ){
					$output .= '	<option ' . selected( $val, $option, 0 ) . '>'. $option .'</option>';
				}
				$output .= '</select>';
			break;

			case 'select2':

				$output .= '<select id="'. $value['id'] .'" name="' . $value['id'] . '" value="'. $val .'" >';
				$keys = array_keys( $value['options'] );
				foreach ( $keys as $key ){
					$option = $value['options'][$key];
					$output .= '	<option value="' . $key . '" ' . selected( $val, $key, 0 ) . '>'. $option .'</option>';
				}
				$output .= '</select>';
			break;

			case 'multiple':

				//$arr_val = explode(',', $val );
				if ( is_array($val) ) $arr_val = $val; else $arr_val = array();
				$output .= '<select multiple="multiple" id="'. $value['id'] .'" name="' . $value['id'] . '[]" value="'. $val .'" >';
				foreach ( $value['options'] as $option ){
					if ( array_search($option, $arr_val) !== false ) $selected = ' selected="selected"';
					else $selected = '';

					$output .= '	<option ' . $selected . '>'. $option .'</option>';
				}
				$output .= '</select>';
			break;

			case 'multiple2':

				//$arr_val = explode(',', $val );
				if ( is_array($val) ) $arr_val = $val; else $arr_val = array();
				$output .= '<select multiple="multiple" id="'. $value['id'] .'" name="' . $value['id'] . '[]" value="'. $val .'" >';
				$keys = array_keys( $value['options'] );
				foreach ( $keys as $key ){
					$option = $value['options'][$key];

					if ( array_search($key, $arr_val) !== false ) $selected = ' selected="selected"';
					else $selected = '';

					$output .= '	<option value="' . $key . '" ' . $selected . '>'. $option .'</option>';
				}
				$output .= '</select>';
			break;

			case 'textarea':

				$output .= '<textarea  id="'. $value['id'] .'" name="' . $value['id'] . '"  >';
				$output .= stripslashes($val);
				$output .= '</textarea>';
			break;

			case 'radio':
				$radiocount = 0;
				foreach( $value['options'] as $option ){
					$output .= '<input type="radio"  id="'. $value['id'] . '-' . $radiocount .'" name="' . $value['id'] . '" '. checked($val,$option,0) . ' value="'. $option .'" /><label class="radio-label"  for="'. $value['id'] . '-' . $radiocount .'" >' . $option . '</label>';
					$radiocount++;
				}
			break;

			case 'radio2':

				$radiocount = 0;
				$keys = array_keys( $value['options'] );
				foreach( $keys as $key ){
					$option = $value['options'][$key];
					$output .= '<input type="radio" id="'. $value['id'] . '-' . $radiocount .'" name="' . $value['id'] . '" '. checked($val,$key,0) . ' value="'. $key .'" /><label class="radio-label"  for="'. $value['id'] . '-' . $radiocount .'" >' . $option . '</label><br/>';
					$radiocount++;
				}
			break;

			case 'check':
				$val = isset($optlive[$value['id']]) ? $optlive[$value['id']] : $value['std'];
				$output .= '<p class="check-style">';
				$output .= '<input type="checkbox" id="'. $value['id'] .'" name="' . $value['id'] . '" '. checked($val,1,0) . ' value="1" />';
				$output .= '<label for="' . $value['id'] . '">' . $value['name'] . '</label>';
			break;

			case 'image':

				$output .= '<input type="text" class="file-url" id="'. $value['id'] .'" name="' . $value['id'] . '" value="' . $val . '" />';
				$output .= '<input type="button" class="upload-image" id="upload-image-'. $value['id'] .'" value="Upload" />';
				$output .= '<div class="uploaded-image" id="uploaded-image-' . $value['id'] . '" >';
				$output .= '<img class="image" src="'. $val .'" /></div>';
				//$output .= '<input type="button" class="remove-image" id="remove-image-'. $value['id'] .'" value="Remove" />';
			break;

			case 'color':
				$output .= '<div id="' . $value['id'] . '_picker" class="colorSelector"><div></div></div>';
				$output .= '<input class="of-color" name="'. $value['id'] .'" id="'. $value['id'] .'" type="text" value="'. $val .'" />';
			break;

			case 'info':
				$output .= '<div id="'. $value['id'] . '" class="wpx-info"><p>' . $value["description"] . '</p></div>';
			break;

			case 'heading':
				$output .= '<h4 class="wpx-heading"><span>' . $value["name"] . '</span></h4>';
				//$output .= '<hr />';
			break;

			case 'open-tab':
				$output .= '<div id="wpx-input-'. $value['id'] .'" class="postbox" >';
				$output .= '<div class="handlediv" title="Click to toggle"><br /></div>'; 
				$output .= '<h3 class="hndle"><span>'. $value['name'] .'</span></h3>';
				$output .= '<div class="inside">';
			break;

			case 'hr' :
				$output .= '<hr />';
			break;
			
			case 'close-tab':
				$output .= '</div>';
				$output .= '</div>';
				if ( isset($value['column']) ) $column = $value['column']; 
				else $column = 1;
				$panel['option-list-' . $column] .= $output;
				$output = '';
			break;
			
		}

		if ( $value['type'] != 'info' && $value['type'] != 'heading' && $value['type'] != 'open-tab' && $value['type'] != 'close-tab' && $value['type'] != 'hr' ){
			$output .= '</p>';
			
			if ( isset( $value['description'] ) )
				$output .= '<p class="description">' . $value['description'] . '</p>';
			$output .= "\n\n";
		}


	}

	$panel['menu'] = $menu;

	return $panel;

}

?>