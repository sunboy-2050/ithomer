CKEDITOR.plugins.add("syntaxhighlight",{lang:["en"],init:function(e){e.addCommand("syntaxhighlight",new CKEDITOR.dialogCommand("syntaxhighlight"));e.ui.addButton("Code",{label:"Add or update a code snippet",icon:this.path+"images/syntaxhighlight.gif",command:"syntaxhighlight",toolbar:"insert,100"});CKEDITOR.dialog.add("syntaxhighlight",this.path+"dialogs/syntaxhighlight.js")}})