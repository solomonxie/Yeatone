<?php 
/********************************
page-contactus.php
特定用来显示“关于我们”的内容。
@page-$??.php，其中??在这里是指在wp后台中，设置某一个页面的静态链接地址和别名为"??"时，
才会调用本页面。如果不在后台设置，这里是不生效的。
********************************/
 ?>
<?php get_header(); ?>
<?php 
// =====Start Loading===========
if (have_posts()): the_post();
// =====Start Loading===========
 ?>

        <!-- 
        ================================================== 
            Contact Section Start
        ================================================== -->
        <section id="contact-section">
            <div class="container">
                <h2 class="subtitle  wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".3s">找到我们</h2>
                <p class="subtitle-des wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".5s">
                    <?php the_field('map-info'); ?>
                </p>
                <!-- Start of Address Details -->
                <div class="row address-details">
                    <div class="col-md-3">
                        <div class="address wow fadeInLeft" data-wow-duration="500ms" data-wow-delay=".3s">
                            <i class="ion-ios-location-outline"></i>
                            <h5><?php the_field('contact1'); ?></h5>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="address wow fadeInLeft" data-wow-duration="500ms" data-wow-delay=".5s">
                            <i class="ion-ios-location-outline"></i>
                            <h5><?php the_field('contact2'); ?></h5>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="email wow fadeInLeft" data-wow-duration="500ms" data-wow-delay=".7s">
                            <i class="ion-ios-email-outline"></i>
                            <h5 style="height: 3em; line-height: 3em;"><?php the_field('contact3'); ?></h5>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="phone wow fadeInLeft" data-wow-duration="500ms" data-wow-delay=".9s">
                            <i class="ion-ios-telephone-outline"></i>
                            <h5 style="height: 3em; line-height: 3em;"><?php the_field('contact4'); ?></h5>
                        </div>
                    </div>
                </div> <!-- End of contact information -->
                <!-- Start of Map -->
                <div class="row">
                    <div class="col-md-12">
                         <div class="map-area">
                            <div class="map">
                                <!--百度地图容器-->
                                <div style="width:100%;height:400px;border:#ccc solid 1px;" id="dituContent"></div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End of Map -->
            </div>
            <!-- End of container -->
        </section>

<?php 
// =====End Loading=====
endif;
// =====End Loading=====
 ?>

        <!-- 
        ================================================== 
            引用百度地图API
        ================================================== -->
        <style type="text/css">
            html,body{margin:0;padding:0;}
            .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
            .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
        </style>
        <script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
        <!-- 这个baidu.map.js是自己创建的,其中涉及到坐标/控制方法等详细设置,
            如果需要修改,则需要到百度地图API网址去生成,然后把JS代码部分复制到这个js文件里就行了. -->
        <script type="text/javascript">
            /********************************
                这段代码是从百度地图API中复制过来的,
                如果需要不同的效果,可以再去生成,
                然后把JS代码部分直接复制到这里就行.
                API地址: http://api.map.baidu.com/lbsapi/creatmap/
                另外,其他的引用在HTML中,不会太难.
             ********************************/
            // var xy = [116.335862,40.063215];
            var xy = [<?php the_field('map-coordinates'); ?>];
            //标注点数组
            var markerArr = [{title:"",content:"",point:""+xy[0]+"|"+xy[1]+"",isOpen:0,icon:{w:23,h:25,l:46,t:21,x:9,lb:12}}
                 ];

            //创建和初始化地图函数：
            function initMap(){
                createMap();//创建地图
                setMapEvent();//设置地图事件
                addMapControl();//向地图添加控件
                addMarker();//向地图中添加marker
            }

            //创建地图函数：
            function createMap(){
                var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
                var point = new BMap.Point(xy[0], xy[1]);//定义一个中心点坐标
                map.centerAndZoom(point,17);//设定地图的中心点和坐标并将地图显示在地图容器中
                window.map = map;//将map变量存储在全局
            }

            //地图事件设置函数：
            function setMapEvent(){
                map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
                map.enableScrollWheelZoom();//启用地图滚轮放大缩小
                map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
                map.enableKeyboard();//启用键盘上下左右键移动地图
            }

            //地图控件添加函数：
            function addMapControl(){
                //向地图中添加缩放控件
                var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
                map.addControl(ctrl_nav);
                    //向地图中添加缩略图控件
                var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:1});
                map.addControl(ctrl_ove);
                    //向地图中添加比例尺控件
                var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
                map.addControl(ctrl_sca);
            }

            //创建marker
            function addMarker(){
                for(var i=0;i<markerArr.length;i++){
                    var json = markerArr[i];
                    var p0 = json.point.split("|")[0];
                    var p1 = json.point.split("|")[1];
                    var point = new BMap.Point(p0,p1);
                    var iconImg = createIcon(json.icon);
                    var marker = new BMap.Marker(point,{icon:iconImg});
                    var iw = createInfoWindow(i);
                    var label = new BMap.Label(json.title,{"offset":new BMap.Size(json.icon.lb-json.icon.x+10,-20)});
                    marker.setLabel(label);
                    map.addOverlay(marker);
                    label.setStyle({
                                borderColor:"#808080",
                                color:"#333",
                                cursor:"pointer"
                    });
                    
                    (function(){
                        var index = i;
                        var _iw = createInfoWindow(i);
                        var _marker = marker;
                        _marker.addEventListener("click",function(){
                            this.openInfoWindow(_iw);
                        });
                        _iw.addEventListener("open",function(){
                            _marker.getLabel().hide();
                        })
                        _iw.addEventListener("close",function(){
                            _marker.getLabel().show();
                        })
                        label.addEventListener("click",function(){
                            _marker.openInfoWindow(_iw);
                        })
                        if(!!json.isOpen){
                            label.hide();
                            _marker.openInfoWindow(_iw);
                        }
                    })()
                }
            }
            //创建InfoWindow
            function createInfoWindow(i){
                var json = markerArr[i];
                var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>"+json.content+"</div>");
                return iw;
            }
            //创建一个Icon
            function createIcon(json){
                var icon = new BMap.Icon("http://app.baidu.com/map/images/us_mk_icon.png", new BMap.Size(json.w,json.h),{imageOffset: new BMap.Size(-json.l,-json.t),infoWindowOffset:new BMap.Size(json.lb+5,1),offset:new BMap.Size(json.x,json.h)})
                return icon;
            }

            initMap();//创建和初始化地图
        </script>
        <!-- 
        ================================================== 
            结束引用百度地图API
        ================================================== -->

<?php get_footer(); ?>