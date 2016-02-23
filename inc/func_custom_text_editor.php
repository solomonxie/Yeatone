<?php 
/*增强默认文字编辑器功能*/
function custum_fontfamily($initArray){
    $initArray['font_formats'] = "微软雅黑='微软雅黑';宋体='宋体';黑体='黑体';仿宋='仿宋';楷体='楷体';隶书='隶书';幼圆='幼圆';";
    return $initArray;
}
add_filter('tiny_mce_before_init', 'custum_fontfamily');
function enable_more_buttons($buttons) {
    $buttons[] = 'hr';
    $buttons[] = 'del';
    $buttons[] = 'sub';
    $buttons[] = 'sup';
    $buttons[] = 'cleanup';
    $buttons[] = 'wp_page';
    $buttons[] = 'anchor';
    $buttons[] = 'backcolor';
    $buttons[] = 'styleselect';
    $buttons[] = 'fontselect';
    $buttons[] = 'fontsizeselect';
    $buttons[] = 'media';
    return $buttons;
}
add_filter("mce_buttons", "enable_more_buttons");

/*>>>>>>>>>>>>>>End of File>>>>>>>>>>>>>>>>>*/
?>