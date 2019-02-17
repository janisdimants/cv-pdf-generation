
$('#cv_image_input').on('change',function() {
  //get the file name
  const filePath = $(this).val();

  const fileName = filePath.split('\\').pop();
  //replace the "Choose a file" label
  $(this).next('.custom-file-label').html(fileName);
})