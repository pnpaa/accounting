(function(){tinymce.create("tinymce.plugins.FELink",{init:function(e,t){var n=true;e.addCommand("FE_Link",function(){if(n)return;e.windowManager.open({id:"wp-link-1",width:480,height:"auto",wpDialog:true,title:e.getLang("advlink.link_desc")},{plugin_url:t});jQuery("input#url-field").focus()});e.addButton("felink",{title:fe_front.texts.insert_link,"class":"mce_link",cmd:"FE_Link"});e.onNodeChange.add(function(e,t,r,i){n=i&&r.nodeName!="A";if(t.get("felink"))t.get("felink").setDisabled(e.selection.isCollapsed())})},getInfo:function(){return{longname:"FE Link Insert",author:"thaint",version:"0.0.1"}}});tinymce.PluginManager.add("felink",tinymce.plugins.FELink)})()