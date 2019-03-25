//1.通过id获取元素
function getId(id) {
    var obj = document.getElementById(id);
    return obj;
}

//2.获取元素的样式
function getStyle(elem,attr) { //elem：元素 ，attr：样式
    if(elem.currentStyle){ //值 ie
        return elem.currentStyle[attr];
    }else {
        return getComputedStyle(elem)[attr];
    }
}

//3.运动函数
/*var time = null;*/
function move(elem,attr,step,target) {
    //当前值：10   目标值：1000 ：前 正
    //当前值10000  目标值0 ： 回  负
    //当前值 < 目标值 ： 正  否则负
    step = parseInt(getStyle(elem,attr)) < target ? step :-step;
    clearInterval(elem.time);
    elem.time = setInterval(function () {
        //3.移动div，在元素当前的位置上  + 10
        var speed = parseInt(getStyle(elem,attr))+step;
        if((speed >= target && step > 0 )||(speed <= target && step < 0)){ //往前走
            speed = target;
            clearInterval(elem.time);
        }
        elem.style[attr] = speed + "px";
    },30);
}


//4.封装绑定事件的函数
function on(elem,type,fun) {//元素：elem ，事件类型：type，事件处理函数：fun
    if(elem.addEventListener){
        elem.addEventListener(type,fun);
    }else {
        elem.attachEvent('on'+type,fun);
    }
}

function off() {
    if(elem.removeEventListener){
        elem.removeEventListener(type,fun);
    }else {
        elem.detachEvent('on'+type,fun);
    }
}


function bufferMove(elem,json,time,fun) { //运动元素elem，属性attr，目标值target，系数time
    clearInterval(elem.timer);
    elem.timer = setInterval(function () {
        for(var attr in json){
            //2.left 在当前的基础上，根据运动路程的大小，速度也不一样
            var cur = attr=="opacity"? parseInt(getStyle(elem,attr)*100) : parseInt(getStyle(elem,attr));

            //从左往右 ceil  从右往左 floor
            var speed = (json[attr]-cur)/time;
            speed = speed > 0 ? Math.ceil(speed) : Math.floor(speed);
            //4.到达目标的时候，停止定时器
            if(cur == json[attr]){
                clearInterval(elem.timer);
                //fun=func fun=undefined  如果第一个判断为假，不会再去判断后面的
                fun&&fun();
            }
            //3.设置到元素上
            elem.style[attr]= attr=="opacity" ? (cur + speed)/100 : (cur+speed+"px");
        }
    },30);
}

//1.封装存储cookie
function setCookie(key,value,day) {
    var oDate = new Date();
    oDate.setDate(oDate.getDate()+7);
    document.cookie = key+"="+value+";expires="+oDate;
}

//2.封装获取cookie
function getCookie(key) {
    var cookie = document.cookie.split("; ");
    for(var i = 0;i<cookie.length;i++){
        var arr = cookie[i].split('='); //["passWord", "4567890"]
        if(arr[0] == key){ //和数组的第一个元素进行比较（key），相等则返回第二个元素(value);
            return arr[1];
        }
    }
    return -1;
}

//3.删除cookie
function removeCookie(key) {
    setCookie(key,1,-1);
}

// ajax请求
function ajax(url,sucFn,errFn) {
    var ajax = new XMLHttpRequest();
    ajax.open('GET',url,true);
    ajax.send();
    ajax.onreadystatechange = function () {
        if(ajax.readyState === 4){
            if(ajax.status === 200){
                sucFn&&sucFn(ajax.responseText); // 如果sucFn存在，才执行sucFn
            }else{
                errFn&&errFn(ajax.status);
            }
        }
    }
}

/*查找上一个元素兄弟节点*/
function prev(ele) {
    var prev = ele.previousSibling;
    while (prev&&prev.nodeType!==1){
        prev = prev.previousSibling;
    }
    return prev;
}
/*最后一个子元素*/
function lastEleChild(ele) {
    return ele.children[ele.children.length-1];
}
/*通过类名获取元素*/
function getByClass(ele,cls) {  // "box red"  "boxred"
    var ary = [];
    var eles = ele.getElementsByTagName('*');
    for(var i = 0; i < eles.length; i++){
        var ary1 =  eles[i].className.split(' ');
        for(var j = 0; j < ary1.length; j++){
            if(ary1[j] === cls){
                ary.push(eles[i]);
            }
        }
    }
    return ary;
};
/*查找下一个元素兄弟节点*/
function next(ele) {
    var next = ele.nextSibling;
    while (next&&next.nodeType!==1){
        next = next.nextSibling;
    }
    return next;
}
