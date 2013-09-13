// JavaScript Document
var cke_config={
	height :"150", // กำหนดความสูง
	width :'100%', // กำหนดความกว้าง * การกำหนดความกว้างต้องให้เหมาะสมกับจำนวนของ Toolbar
/*		fullPage : true, // กำหนดให้สามารถแก้ไขแบบเโค้ดเต็ม คือมีแท็กตั้งแต่ <html> ถึง </html>*/
	toolbar: [
						[ 'Source', '-', 'Undo', 'Redo' ],
						[ 'Find', 'Replace', '-', 'SelectAll', 'RemoveFormat' ],
						[ 'Link', 'Unlink', 'SpecialChar', '-' ,'Cut', 'Copy', 'Paste', 'Pastetext', 'Pastefromword'],
						//'/',
						[ 'Bold', 'Italic', 'Underline','Blockquote' ],
						[ 'TextColor', 'SpellChecker'],
						['JustifyLeft', 'JustifyCenter', 'JustifyRight','JustifyBlock' ],
						[ 'NumberedList', 'BulletedList', '-', 'Blockquote' ],
						[ 'Table','HorizontalRule' ]
					],
}
/*

config.toolbar_Complete =
[
    ['Source','-','Save','NewPage','Preview','-','Templates'],
    ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
    ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
    ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
    '/',
    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
    ['Link','Unlink','Anchor'],
    ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
    '/',
    ['Styles','Format','Font','FontSize'],
    ['TextColor','BGColor'],
    ['Maximize', 'ShowBlocks','-','About']
];
*/

function InsertHTML(htmlValue,editorObj){// ฟังก์ขันสำหรับไว้แทรก HTML Code
	if(editorObj.mode=='wysiwyg'){
		editorObj.insertHtml(htmlValue);
	}else{
		alert( 'You must be on WYSIWYG mode!');
	}	
}
function SetContents(htmlValue,editorObj){ // ฟังก์ชันสำหรับแทนที่ข้อความทั้งหมด
	editorObj.setData(htmlValue);
}
function GetContents(editorObj){// ฟังก์ชันสำหรับดึงค่ามาใช้งาน
	return editorObj.getData();
}
function ExecuteCommand(commandName,editorObj){// ฟังก์ชันสำหรับเรียกใช้ คำสั่งใน CKEditor
	if(editorObj.mode=='wysiwyg'){
		editorObj.execCommand(commandName);
	}else{
		alert( 'You must be on WYSIWYG mode!');
	}
}
/*
function validate() {
   var detail_th = FCKeditorAPI.GetInstance('detail_th') ;
   var detail_th2 = FCKeditorAPI.GetInstance('detail_th2') ;
   if (detail_th.GetXHTML() == "" || detail_th.GetXHTML() == null){
          alert("Alert: Description is blank.");
          document.send.detail_th.focus();
          return false
   } else if(detail_th2.GetXHTML() == "" || detail_th2.GetXHTML() == null){
          alert("Alert: Solution is blank.");
          document.send.detail_th2.focus();
          return false
   } else {
     return true
   }
}
*/
