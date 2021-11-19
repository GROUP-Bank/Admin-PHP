
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>FATTURAZIONE ELETTRONICA</title>
    <style type="text/css">
        html, body{
            margin:0;
            padding:0;
        }

        #ark_background{
            width: 100%;
            height: 100%;
            background-color: #126199;
            position: absolute;
            z-index: 999999999;
        }

        .ark_progress{
            width: 360px;
            height: 36px;
            max-height: 36px;
            position:absolute; /*it can be fixed too*/
            left:0; right:0;
            top:0; bottom:0;
            margin:auto;
        }

        .ark_progress-bar {
            width: 360px;
            height: 5px;
            background-color: #FAFAFA;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            border-radius: 5px;

            -moz-box-shadow: 0 1px 5px #000 inset, 0 1px 0 #444;
            -webkit-box-shadow: 0 1px 5px #000 inset, 0 1px 0 #444;
            box-shadow: 0 1px 5px #000 inset, 0 1px 0 #444;


        }

        #ark_progress_bar_cursor {
            background-color: #F00;
            height: 100%;
            display: inline-block;
            -webkit-transition: width .4s ease-in-out;
            -moz-transition: width .4s ease-in-out;
            -ms-transition: width .4s ease-in-out;
            -o-transition: width .4s ease-in-out;
            transition: width .4s ease-in-out;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            border-radius: 5px;

            -moz-box-shadow: 0 1px 5px #000 inset, 0 1px 0 #444;
            -webkit-box-shadow: 0 1px 5px #000 inset, 0 1px 0 #444;
            box-shadow: 0 1px 5px #000 inset, 0 1px 0 #444;
        }
        .ark_progress-logo{
            color: #FAFAFA;
            float:left;
            margin-right: 10px;
            font: normal 22px arial, tahoma, sans-serif;
        }

        .ark_progress-title{
            height: 36px;
            max-height: 36px;
            color: #FAFAFA;
            float:left;
            margin-right: 10px;
            font: normal 22px arial, tahoma, sans-serif;
        }

        #ark_progress-script{
            height: 36px;
            max-height: 36px;
            max-width: 200px;
            color: #FAFAFA;
            float:left;
            font: normal 22px arial, tahoma, sans-serif;
            overflow:hidden;
            font-size: 14px;
            line-height: 30px;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="../extjs/resources/css/ext-all.css?rel=3.4_(Wiles)_-_4069_T_" />
    <link rel="stylesheet" type="text/css" href="../main/js/portal/portal.css?rel=3.4_(Wiles)_-_4069_T_" />
    <link rel="stylesheet" type="text/css" href="../main/js/calendar/resources/css/extensible-all.css?rel=3.4_(Wiles)_-_4069_T_" />
    <link rel="stylesheet" type="text/css" href="../main/css/arkottica.css?rel=3.4_(Wiles)_-_4069_T_" />
    <link rel="stylesheet" type="text/css" href="js/wizard/src/css/Ext.ux.Wizard.css?rel=3.4_(Wiles)_-_4069_T_">
    <link rel="stylesheet" href="js/pdfpanel/ux/util/PDF/TextLayerBuilder.css?rel=3.4_(Wiles)_-_4069_T_">
    <link rel="stylesheet" href="js/ux/dataView/DragSelector.css?rel=3.4_(Wiles)_-_4069_T_">

    <script type="text/javascript" language="javascript">
        function _isMobile(){
            var isMobile = (/iphone|ipod|ipad|android|ie|blackberry|fennec/).test
            (navigator.userAgent.toLowerCase());
            return isMobile;
        }

        if(_isMobile()){
            var myWidth = 0, myHeight = 0;
            if (typeof (window.innerWidth) == 'number') {
                //Non-IE
                myWidth = window.innerWidth;
                myHeight = window.innerHeight;
            } else if (document.documentElement && (document.documentElement.clientWidth ||   document.documentElement.clientHeight)) {
                //IE 6+ in 'standards compliant mode'
                myWidth = document.documentElement.clientWidth;
                myHeight = document.documentElement.clientHeight;
            } else if (document.body && (document.body.clientWidth || document.body.clientHeight)) {
                //IE 4 compatible
                myWidth = document.body.clientWidth;
                myHeight = document.body.clientHeight;
            }
            //alert(myWidth + ' - ' + myHeight);
            x = document.getElementsByTagName("head")[0];
            if(myWidth > 400){
                x.innerHTML += '<meta name="viewport" content=" initial-scale=1.0, minimum-scale=1.3, maximum-scale=1.3"/>';
            }else{
                x.innerHTML += '<meta name="viewport" content=" initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0"/>';
            }
        }
    </script>

    <script type="text/javascript">awhy_api_url = '//manage.awhy.it';awhy_contents_base_url = '//gamma.awhy.it/chat';awhy_widget_id = '588';instance_id = '647';instance_name = 'ay_registerit_efatt_awhy_it';</script><script src='//gamma.awhy.it/chat/awhypa_original.js' type='text/javascript'></script>
</head>
<body>
<div id="ark_background">
    <div class="ark_progress">
        <div class="ark_progress-logo"><img src="images/squares.gif" style="width: 28px" /></div>
        <div class="ark_progress-title">FATTURAZIONE ELETTRONICA...</div>
        <div id="ark_progress-script">Init</div>
        <div style="clear: both"></div>
        <div class="ark_progress-bar">
            <span id="ark_progress_bar_cursor"></span>
        </div>
    </div>
</div>

<script type="text/javascript">
    var Arkottica = new Object();
    var scriptLoader = function (scripts, stackCounter) {
        if(scripts.length == 0){
            Ext.Loader.setConfig({
                enabled: true,
                disableCaching: false,
                paths: {
                    'Extensible': '../main/js/calendar/src'
                }
            });

            Ext.onReady(function(){

                Ext.QuickTips.init();
                //init per dimensioni massime tooltip (di default e' impostato a 300px)
                Ext.apply(Ext.tip.QuickTipManager.getQuickTip(), {
                    maxWidth: 1000,      //larghezza massima tooltip
                    dismissDelay: 30000,  //durata tooltip - 30 sec
                    showDelay: 2000      //ritarda show tooltip - 2sec
                });


                Ext.state.Manager.setProvider(Ext.create('Ext.state.CookieProvider'));
                if(_isMobile()){
                    Ext.EventManager.onWindowResize(function () {return false;});
                }
                Arkottica.utils.initSessionId();
                Arkottica.startup();
            });

            return;
        }
        var fileref = document.createElement('script');
        fileref.setAttribute("type", "text/javascript");
        fileref.setAttribute("src", scripts[0] + "?id=3.4_(Wiles)_-_4069_T_");
        scripts.shift();
        document.getElementsByTagName("body")[0].appendChild(fileref);
        fileref.onload = function () {
            obj = document.getElementById("ark_progress_bar_cursor");
            obj.style.width = ((stackCounter - scripts.length) * 100 /stackCounter)  + "%" ;

            obj = document.getElementById("ark_progress-script");
            obj.innerHTML = scripts[0] ? scripts[0] : 'startup';
            scriptLoader(scripts, stackCounter);
        }
    };

    var scripts = [];
    scripts.push("../extjs/ext-all.js");
    scripts.push("../main/js/portal/classes/Portlet.js");
    scripts.push("../main/js/portal/classes/PortalColumn.js");
    scripts.push("../main/js/portal/classes/PortalPanel.js");
    scripts.push("../main/js/portal/classes/PortalDropZone.js");

    scripts.push("../main/js/portal/classes/ChartPortlet.js");
    scripts.push("../main/js/portal/classes/CheckInComponent.js");

    scripts.push("../main/js/calendar/extensible-all-debug.js");

    scripts.push("js/utils.js");
    scripts.push("js/lookupField.js");
    scripts.push("js/menu.js");
    scripts.push("js/init.js");
    scripts.push("js/userPortal.js");
    scripts.push("js/login.js");
    scripts.push("js/grid.js");
    scripts.push("js/groupGrid.js");
    scripts.push("js/editor.js");
    scripts.push("js/wizard.js");
    scripts.push("js/uploadComponent.js");
    scripts.push("js/checkOutComponent.js");
    scripts.push("js/checkInComponent.js");
    scripts.push("js/documentViewerComponent.js");
    scripts.push("js/wizard/src/Ext.ux.WizardHeader.js");
    scripts.push("js/wizard/src/Ext.ux.BasicWizard.js");
    scripts.push("js/calendar.js");
    scripts.push("js/webmail.js");
    scripts.push("js/workflow.js");
    scripts.push("js/print/printer.js");
    scripts.push("../tinymce/tiny_mce_src.js");
    scripts.push("js/TinyMCETextArea.js");
    scripts.push("js/jquery/jquery-1.9.1.min.js");

    scripts.push("js/pdfpanel/pdfjs/compatibility.js");
    scripts.push("js/pdfpanel/pdfjs/pdf.js");
    scripts.push("js/pdfpanel/ux/panel/PDF.js");
    scripts.push("js/pdfpanel/ux/util/PDF/TextLayerBuilder.js");
    scripts.push("js/pdfpanel.js");
    scripts.push("js/graphometric.js");
    scripts.push("js/drawingField.js");
    scripts.push("js/autocompleteField.js");
    scripts.push("js/ux/grid/FiltersFeature.js");
    scripts.push("js/ux/grid/TreeFiltersFeature.js");
    scripts.push("js/ux/grid/filter/Filter.js");
    scripts.push("js/ux/grid/filter/StringFilter.js");
    scripts.push("js/ux/grid/filter/CustomFilter.js");
    scripts.push("js/ux/grid/filter/NumericFilter.js");
    scripts.push("js/ux/grid/filter/BooleanFilter.js");
    scripts.push("js/ux/grid/filter/ListFilter.js");
    scripts.push("js/ux/grid/filter/DateFilter.js");
    scripts.push("js/ux/grid/menu/ListMenu.js");
    scripts.push("js/ux/grid/menu/RangeMenu.js");
    scripts.push("js/dataView.js");
    scripts.push("js/ux/dataView/Animated.js");
    scripts.push("js/ux/dataView/Draggable.js");
    scripts.push("js/ux/dataView/DragSelector.js");
    scripts.push("js/ux/dataView/LabelEditor.js");
    scripts.push("js/ux/data/PagingMemoryProxy.js");
    scripts.push("js/arkottica.js");

    scriptLoader(scripts, scripts.length);


</script>

<span id="app-msg" class="x-hidden"></span>

</body>
</html>
