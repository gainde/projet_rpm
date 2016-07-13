/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var SlideShow = function(prev,next,divInfClass,divSupId){
	this.prev = prev;
	this.next = next;
	this.divInf = divInfClass;
	this.divSup = divSupId;
	this.time = 500;
	this.interFab =0;
        var height_div = $(this.divSup).height();
        $(this.divInf).css('height',height_div);
        $(this.divInf).css('overflow','hidden');
        $(this.divInf).children().css('height',height_div);
        $(this.prev).css('cursor','pointer');$(this.next).css('cursor','pointer');
}
SlideShow.prototype.setPeriode=function(value){
	this.time = value;
}
SlideShow.prototype.getPeriode=function(){
	return this.time;
}
SlideShow.prototype.setInterFab=function(value){
	this.interFab = value;
}
SlideShow.prototype.getInterFab=function(){
	return this.interFab;
}
SlideShow.prototype.addEventClickNext=function(){
	$(this.next).bind('click', {context: this}, this.onClickNext);
}

SlideShow.prototype.addEventClickPrev=function(){
	$(this.prev).bind('click', {context: this}, this.onClickPrev);
}
SlideShow.prototype.addEventMouseover=function(){
	$(this.divSup).bind('mouseover', {context: this}, this.mouseOver);
}
SlideShow.prototype.addEventMouseout=function(){
	$(this.divSup).bind('mouseout', {context: this}, this.mouseOut);
}
SlideShow.prototype.onClickNext = function(ev){
		var self = ev.data.context;
		self.handleCellClick();
}
SlideShow.prototype.handleCellClick=function(){
    $(this.divInf).children(':last').prependTo($(this.divInf));
    $(this.divInf).children().css('display','inline-block');
    $(this.divInf).children(':first').css('width','9%');
    $(this.divInf).children(':first').next().css('width','90%');
    
    $(this.divInf).children(':first').animate({width: '99%'},"slow",function(){$(this).animate({opacity:'0.3'},"slow");$(this).animate({opacity:'1'},"slow");$(this).css('width','100%')});
    $(this.divInf).children(':first').next().animate({width: '0%'},"slow",function(){});
	//$(this.divInf).children(':last').prependTo($(this.divInf)).fadeOut().fadeIn();
}
SlideShow.prototype.onClickPrev = function(ev){
		var self = ev.data.context;
		self.handleCellClickPrev();
}
SlideShow.prototype.handleCellClickPrev=function(){
	$(this.divInf).children(':first').css('width','90%');
	$(this.divInf).children(':first').next().css('width','9%');
	$(this.divInf).children().css('display','inline-block');
 	$(this.divInf).children(':first').animate({width: '0%'},"slow");
	$(this.divInf).children(':first').next().animate({width: '99%'},"slow",function(){$(this).animate({opacity:'0.3'},"slow");$(this).animate({opacity:'1'},"slow");$(this).css('width','99%');$(this.divInf).children(':first').appendTo($(this.divInf));});
        //$(this.divInf).children(':first').appendTo($(this.divInf)).fadeIn();
}
SlideShow.prototype.mouseOver = function(ev){
		var self = ev.data.context;
		self.handleCellOver();
}
SlideShow.prototype.slideRun = function(){
    $(this.divInf).children(':last').prependTo($(this.divInf));
    $(this.divInf).children(':first').css('width','9%');
    $(this.divInf).children(':first').next().css('width','90%');
    $(this.divInf).children().css('display','inline-block');
    $(this.divInf).children(':first').animate({width: '99%'},"slow",function(){$(this).animate({opacity:'0.3'},"slow");$(this).animate({opacity:'1'},"slow");$(this).css('width','100%')});
    $(this.divInf).children(':first').next().animate({width: '0%'},"slow",function(){});
	
   //$(this.divInf).children(':last').prependTo($(this.divInf)).fadeOut().fadeIn();
}
SlideShow.prototype.handleCellOver = function(){
		clearInterval(this.interFab);
}
SlideShow.prototype.mouseOut = function(ev){
		var self = ev.data.context;
		self.handleCellOut();
}
SlideShow.prototype.handleCellOut = function(){	
    this.interFab = setInterval(function(){ 
        //$(this.divInf).children(':last').prependTo($(this.divInf)).fadeOut().fadeIn()
        $(this.divInf).children(':last').prependTo($(this.divInf));
        $(this.divInf).children(':first').css('width','9%');
    $(this.divInf).children(':first').next().css('width','90%');
    $(this.divInf).children().css('display','inline-block');
    $(this.divInf).children(':first').animate({width: '99%'},"slow",function(){$(this).animate({opacity:'0.3'},"slow");$(this).animate({opacity:'1'},"slow");$(this).css('width','99%')});
    $(this.divInf).children(':first').next().animate({width: '0%'},"slow",function(){});
	;}, this.time)
}

SlideShow.prototype.run=function(){
			this.addEventClickNext();
			this.addEventClickPrev();
			this.addEventMouseover();
			this.addEventMouseout();
	}

var SlideShowVertical = function(prev,next,divInfClass,divSupId){
	this.prev = prev;
	this.next = next;
	this.divInf = divInfClass;
	this.divSup = divSupId;
	this.time = 500;
	this.interFab =0;
        var height_div = $(this.divSup).height()-60;
        $(this.divInf).css('height',height_div);
        $(this.divInf).css('overflow','hidden');
        $(this.divInf).children().css('height',height_div);
        $(this.prev).css('cursor','pointer');$(this.next).css('cursor','pointer');
}
SlideShowVertical.prototype.setPeriode=function(value){
	this.time = value;
}
SlideShowVertical.prototype.getPeriode=function(){
	return this.time;
}
SlideShowVertical.prototype.setInterFab=function(value){
	this.interFab = value;
}
SlideShowVertical.prototype.getInterFab=function(){
	return this.interFab;
}
SlideShowVertical.prototype.addEventClickNext=function(){
	$(this.next).bind('click', {context: this}, this.onClickNext);
}

SlideShowVertical.prototype.addEventClickPrev=function(){
	$(this.prev).bind('click', {context: this}, this.onClickPrev);
}
SlideShowVertical.prototype.addEventMouseover=function(){
	$(this.divSup).bind('mouseover', {context: this}, this.mouseOver);
}
SlideShowVertical.prototype.addEventMouseout=function(){
	$(this.divSup).bind('mouseout', {context: this}, this.mouseOut);
}
SlideShowVertical.prototype.onClickNext = function(ev){
		var self = ev.data.context;
		self.handleCellClick();
}
SlideShowVertical.prototype.handleCellClick=function(){
    $(this.divInf).children(':last').prependTo($(this.divInf)).fadeOut().fadeIn();
}
SlideShowVertical.prototype.onClickPrev = function(ev){
		var self = ev.data.context;
		self.handleCellClickPrev();
}
SlideShowVertical.prototype.handleCellClickPrev=function(){
	$(this.divInf).children(':first').appendTo($(this.divInf)).fadeIn();
}
SlideShowVertical.prototype.mouseOver = function(ev){
		var self = ev.data.context;
		self.handleCellOver();
}
SlideShowVertical.prototype.slideRun = function(){
   $(this.divInf).children(':last').prependTo($(this.divInf)).fadeOut().fadeIn();
}
SlideShowVertical.prototype.handleCellOver = function(){
		clearInterval(this.interFab);
}
SlideShowVertical.prototype.mouseOut = function(ev){
		var self = ev.data.context;
		self.handleCellOut();
}
SlideShowVertical.prototype.handleCellOut = function(){	
    this.interFab = setInterval(function(){ 
      $(this.divInf).children(':last').prependTo($(this.divInf)).fadeOut().fadeIn();
       }, this.time)
}

SlideShowVertical.prototype.run=function(){
			this.addEventClickNext();
			this.addEventClickPrev();
			this.addEventMouseover();
			this.addEventMouseout();
	}

