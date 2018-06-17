// JavaScript Document

tinymce.init({selector:'#body',
			theme: "modern",
			skin: "lightgray",
			height : 300,
			menubar : true,
			statusbar : false,
			forced_root_block : false,
			force_p_newlines : false,
			paste_as_text: true,
			style_formats:
			[{title: "Headers", items: [{title: "Header 1",format: "h1"}, {title: "Header 2",format: "h2"}, {title: "Header 3",format: "h3"}, {title: "Header 4",format: "h4"}, {title: "Header 5",format: "h5"}, {title: "Header 6",format: "h6"}]}, 
            {title: "Inline",items: [{title: "Bold",icon: "bold",format: "bold"}, {title: "Italic",icon: "italic",format: "italic"}, 
            {title: "Underline",icon: "underline",format: "underline"}, {title: "Strikethrough",icon: "strikethrough",format: "strikethrough"}, {title: "Superscript",icon: "superscript",format: "superscript"}, {title: "Subscript",icon: "subscript",format: "subscript"}, {title: "Code",icon: "code",format: "code"}]}, 
            {title: "Blocks",items: [{title: "Paragraph",format: "p"}, {title: "Blockquote",format: "blockquote"}, {title: "Div",format: "div"}, {title: "Pre",format: "pre"}]}, 
            {title: "Alignment",items: [{title: "Left",icon: "alignleft",format: "alignleft"}, {title: "Center",icon: "aligncenter",format: "aligncenter"}, {title: "Right",icon: "alignright",format: "alignright"}, {title: "Justify",icon: "alignjustify",format: "alignjustify"}]}, 
            {title: "Table Fotmat", items: [{title : 'Cell Format', selector : 'td', styles : {'color' : '#444444', 'vertical-align' : 'text-top','line-height':'1.5' ,'font-size' : '12px', 'font-family':'Arial', 'padding-top':'10px'}}]},
    		],
			plugins: "paste code link image table textcolor colorpicker",
			toolbar_items_size: 'small',
			toolbar: "undo redo | bold italic | bullist numlist | forecolor backcolor | code | styleselect | link image table"});



tinymce.init({selector:'#externalHTML',
			theme: "modern",
			skin: "lightgray",
			height : 300,
			menubar : false,
			statusbar : false,
			forced_root_block : false,
			force_p_newlines : false,
			paste_as_text: true,
			plugins: "paste link code image table",
			toolbar_items_size: 'small',
			toolbar: "undo redo | bold italic | bullist numlist | link code image table"
});

tinymce.init({selector:'#offers',
			theme: "modern",
			skin: "light",
			height : 300,
			menubar : false,
			statusbar : false,
			forced_root_block : false,
			force_p_newlines : false,
			paste_as_text: true,
			style_formats:
			[{title: "Headers", items: [{title: "Header 1",format: "h1"}, {title: "Header 2",format: "h2"}, {title: "Header 3",format: "h3"}, {title: "Header 4",format: "h4"}, {title: "Header 5",format: "h5"}, {title: "Header 6",format: "h6"}]}, 
            {title: "Inline",items: [{title: "Bold",icon: "bold",format: "bold"}, {title: "Italic",icon: "italic",format: "italic"}, 
            {title: "Underline",icon: "underline",format: "underline"}, {title: "Strikethrough",icon: "strikethrough",format: "strikethrough"}, {title: "Superscript",icon: "superscript",format: "superscript"}, {title: "Subscript",icon: "subscript",format: "subscript"}, {title: "Code",icon: "code",format: "code"}]}, 
            {title: "Blocks",items: [{title: "Paragraph",format: "p"}, {title: "Blockquote",format: "blockquote"}, {title: "Div",format: "div"}, {title: "Pre",format: "pre"}]}, 
            {title: "Alignment",items: [{title: "Left",icon: "alignleft",format: "alignleft"}, {title: "Center",icon: "aligncenter",format: "aligncenter"}, {title: "Right",icon: "alignright",format: "alignright"}, {title: "Justify",icon: "alignjustify",format: "alignjustify"}]}, 
            {title: "Table Fotmat", items: [{title : 'Cell Format', selector : 'td', styles : {'color' : '#444444', 'vertical-align' : 'text-top','line-height':'1.5' ,'font-size' : '12px', 'font-family':'Arial', 'padding-top':'10px'}}]},
    		],
			plugins: "paste code link image table textcolor",
			toolbar_items_size: 'small',
			toolbar: "undo redo | bold italic forecolor | bullist numlist | code | styleselect | link image table"});
			
			
tinymce.init({selector:'111textarea',
			theme: "modern",
			skin: "light",
			height : 10,
			menubar : false,
			statusbar : false,
			forced_root_block : false,
			force_p_newlines : false,
			paste_as_text: true,
			plugins: "paste link code",
			toolbar_items_size: 'small',
			toolbar: "undo redo | bold italic | forecolor | bullist numlist | link code"
});

/*
tinymce.init({selector:'#offertext_2',
			theme: "modern",
			skin: "light",
			height : 10,
			menubar : false,
			statusbar : false,
			forced_root_block : false,
			force_p_newlines : false,
			paste_as_text: true,
			plugins: "paste link code",
			toolbar_items_size: 'small',
			toolbar: "undo redo | bold italic | bullist numlist | link code"
});

tinymce.init({selector:'#offertext_3',
			theme: "modern",
			skin: "light",
			height : 10,
			menubar : false,
			statusbar : false,
			forced_root_block : false,
			force_p_newlines : false,
			paste_as_text: true,
			plugins: "paste link code",
			toolbar_items_size: 'small',
			toolbar: "undo redo | bold italic | bullist numlist | link code"
});

tinymce.init({selector:'#offertext_4',
			theme: "modern",
			skin: "light",
			height : 10,
			menubar : false,
			statusbar : false,
			forced_root_block : false,
			force_p_newlines : false,
			paste_as_text: true,
			plugins: "paste link code",
			toolbar_items_size: 'small',
			toolbar: "undo redo | bold italic | bullist numlist | link code"
});*/
