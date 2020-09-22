@if($productCustomField)
	<?php
		$customfields = NULL;
		$customfields = $productCustomField->customfields;
		$customfields_data = NULL;
		$html_content = NULL;

		if ($customfields !== NULL) {
			$customfields_data = json_decode($customfields, true);
		}

		if ($customfields_data !== NULL) {
			foreach ($customfields_data as $key => $value) {
				if ($value['type'] === "text") {
					$html_content .= "
									<div class='form-group'>
										<label>".$value['label']."</label>
										<input type='text' value='".$value['value']."' class='form-control'>
									</div>
								";
				}

				if ($value['type'] === "select") {
					$html_content .= "
									<div class='form-group'>
										<label>".$value['label']."</label>
										<select class='form-control'>
											<option selected value='".$value['value']."'>".$value['value']."</option>
										</select>
									</div>
								";
				}

				if ($value['type'] === "radio") {
					$html_content .= "
									<div class='form-group'>
										<label>".$value['label']."</label>
										<input checked type='radio' value='".$value['value']."'> ".$value['value']."
									</div>
								";
				}

				if ($value['type'] === "checkbox") {
					$html_content .= "
									<div class='form-group'>
										<label>".$value['label']."</label>
										<input checked type='checkbox' value='".$value['value']."'> ".$value['value']."
									</div>
								";
				}

				if ($value['type'] === "file") {
					$html_content .= "
									<div class='form-group'>
										<label>".$value['label']."</label>
										<input type='file' class='form-control'> ".$value['value']."
									</div>
								";
				}
			}

			echo $html_content;
		}
	?>
@endif