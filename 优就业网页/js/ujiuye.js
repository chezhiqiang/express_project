/*导航部分效果*/
var oNav = document.getElementById("nav");
var oList = oNav.getElementsByClassName("list")[0];
var oLis = oList.children;
var oMen = oList.getElementsByClassName("menu");
for (var i = 0;i<oLis.length;i++) {
    oLis[i].onmouseover = function () {
        for (var i = 0;i<oLis.length;i++){
            oLis[i].className = "";
        }
        this.className = "active";
        this.lastElementChild.style.display = "block";
    }
    oLis[i].onmouseout = function () {
        for (var j = 0;j<oMen.length;j++){
            oMen[j].style.display = "none";
        }
    }
}
/*轮播图*/
var mySwiper = new Swiper('.swiper-container',{
    pagination: '.pagination',
    paginationClickable: true,
    moveStartThreshold: 100
});
/*日期跳动效果*/
var oMonth = document.getElementsByClassName("month-list")[0];
var oData = document.getElementsByClassName("date-list")[0];
var oContent = document.getElementsByClassName('content')[0];
window.onscroll = function(){
    var st = document.body.scrollTop || document.documentElement.scrollTop;
    if(st >= oContent.offsetHeight+oContent.offsetTop - document.documentElement.clientHeight-10){
        bufferMove(oMonth,{'bottom':-770},10,function () {
            bufferMove(oData,{'bottom':-280},10,function () {
                window.onscroll = null;
            });
        });
    }
};
/*第二层学习java移入效果*/
var oCont = document.getElementsByClassName("content02")[0];
var oUl = oCont.getElementsByTagName("ul");
var oBox = oCont.getElementsByClassName("box2")[0];
var oLi = oCont.getElementsByTagName("li");
for (var i = 0 ;i<oUl.length;i++){
    oUl[i].onmouseover = function () {
        /*for (var i = 0;i<oUl[i].length;i++){
            oUl[i].className = "";
        }*/
       /* this.style.color = "#fff";*/

        if(this.className === "box2"){
            this.className = "box2 active01";
        }else{
            this.className = "active01";
        }
    };
    oUl[i].onmouseout = function () {

        if(this.className === "box2 active01"){
            this.className = "box2";
        }else{
            this.className = "";
        }
    }
}

//移入变色效果
var content04  = document.getElementsByClassName("content04")[0];
var oH = content04.getElementsByTagName("h6");
for (var i = 0;i<oH.length;i++){
    oH[i].onmouseover = function () {
    this.className = "active02";
    }
    oH[i].onmouseout = function () {
        this.className = "";
    }
}

var oTab = document.getElementById("tab");
var oP = oTab.getElementsByTagName("p");
var oEm = oTab.getElementsByTagName("em");
for (var i = 0;i<oP.length;i++){
    oP[i].onmouseover = function () {
        this.className = "active03";
    };
    oP[i].onmouseout = function () {
        this.className = "";
    };
}
for (var j = 0;j<oEm.length;j++){
    oEm[j].onmouseover = function () {
        this.className = "active04";
    };
    oEm[j].onmouseout = function () {
        this.className = "";
    };
}
/*鼠标移入课程，显示遮罩层*/
var oJavaList = document.getElementsByClassName("JavaList")[0];
var oImg = oJavaList.getElementsByClassName("img-block");
for (var i = 0;i<oImg.length;i++){
    oImg[i].onmouseover = function () {
        move(lastEleChild(this),'bottom',20,0);
    }
    oImg[i].onmouseout = function () {
        move(lastEleChild(this),'bottom',20,-150)
    }
}
//鼠标滑过变色
var oBtn1 = oJavaList.getElementsByClassName("btn1");
var oBtn2 = oJavaList.getElementsByClassName("btn2");
for (var i = 0;i<oBtn1.length;i++){
    oBtn1[i].onmouseover = function () {
        if(this.className == "btn1"){
            this.className = "btn1 active05";
        }else{
            this.className = "active05";
        }
    };
    oBtn1[i].onmouseout = function () {
        if(this.className == "btn1 active05"){
            this.className = "btn1";
        }else{
            this.className = "";
        }
    };
}
for (var i = 0;i<oBtn2.length;i++){
    oBtn2[i].onmouseover = function () {
        if(this.className == "btn2"){
            this.className = "btn2 active06";
        }else{
            this.className = "active06";
        }
    };
    oBtn2[i].onmouseout = function () {
        if(this.className == "btn2 active06"){
            this.className = "btn2";
        }else{
            this.className = "";
        }
    };
}
/*模拟表单placeholder*/
var oForm = document.getElementById("form01");
var oSpan = oForm.getElementsByTagName('span');
var oIn = oForm.getElementsByTagName('input');
for (var i = 0; i < oSpan.length; i++){
    oSpan[i].onclick = function () {
        prev(this).focus();
    };
    oIn[i].onkeyup = function (e) {
        e = e || window.event;
        if(this.value){
            next(this).style.display = "none";
        }else{
            next(this).style.display = "block";
        }

    }
}
/*模拟表单placeholder*/
var oForm02 = document.getElementById("form02");
var  oI = oForm02.getElementsByTagName("i");
var oIn = oForm02.getElementsByTagName('input');
for (var i = 0; i < oSpan.length; i++){
    oI[i].onclick = function () {
        prev(this).focus();
    };
    oIn[i].onkeyup = function (e) {
        e = e || window.event;
        if(this.value){
            next(this).style.display = "none";
        }else{
            next(this).style.display = "block";
        }

    }
}
/*滑过显示动画*/
/*var oUL = document.getElementsByClassName("ulList")[0];
var oli = oUL.getElementsByTagName("li");
var oAct = oUL.getElementsByTagName("div");

for (var i = 0;i<oli.length;i++){
    oAct[i].index = i;
    oli[i].onmouseover = function () {

        for (var i = 0;i<oAct.length;i++){

            oAct[this.index].style.display = "block";
        }
    }

}*/
/*表单验证*/
var oFrom3 = document.getElementById("form02");
var oName = oFrom3.userName;
var oPhone = oFrom3.userphone;
var oQ = oFrom3.userqq;
var oIn = oFrom3.getElementsByTagName("input");

oName.onblur = function(){
    blurFn(this);
};
oPhone.onblur = function () {
    blurFn(this);
};
oQ.onblur = function () {
    blurFn(this);
};

function blurFn(ele) {
    var val = ele.value;
    var reg = null;
    switch (ele.name){
        case 'userName' : reg = /^[\u4E00-\u9FA5\uf900-\ufa2d·s]{2,20}$/;break;
        case 'userphone' : reg = /\d{11}/;break;
        case 'userqq' : reg = /^\w{5,15}$/;break;
    }
    var result = reg.test(val);
    if(result){
        ele.setAttribute('flag',1);
    }else{
        ele.setAttribute('flag',0);
    }
};
oFrom3.onsubmit = function () {
    var flag = 0;
    for(var i = 0;i < oIn.length; i++){
        flag += Number(oIn[i].getAttribute('flag'));
    }
    if(flag !== 3){
        alert('表单验证未通过！');
        return false; //阻止表单提交
    }
}


