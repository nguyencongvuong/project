/*!
 * webTicker 2.1.1
 * Examples and documentation at:
 * http://jonmifsud.com/open-source/jquery/jquery-webticker/
 * 2011 Jonathan Mifsud
 * Version: 2.1.1 (23-MAY-2013)
 * Dual licensed under the Creative Commons and DonationWare licenses:
 * http://creativecommons.org/licenses/by-nc/3.0/
 * https://github.com/jonmifsud/Web-Ticker/blob/master/licence.md
 * Requires:
 * jQuery v1.4.2 or later
 *
 */
(function($){var cssTransitionsSupported=(function(){var s=document.createElement('p').style,v=['ms','O','Moz','Webkit'];if(s['transition']=='')return true;while(v.length)
if(v.pop()+'Transition'in s)
return true;return false;})();function scrollitems($strip,moveFirst){var settings=$strip.data('settings')||{direction:"left"};if(typeof moveFirst==='undefined')
moveFirst=false;if(moveFirst){moveFirstElement($strip);}
var options=animationSettings($strip);$strip.animate(options.css,options.time,"linear",function(){$strip.css(settings.direction,'0');scrollitems($strip,true);});}
function animationSettings($strip){var settings=$strip.data('settings')||{direction:"left",speed:50};var first=$strip.children().first();var distance=Math.abs(-$strip.css(settings.direction).replace('px','').replace('auto','0')-first.outerWidth(true));var settings=$strip.data('settings');var timeToComplete=distance*1000/settings.speed;var animationSettings={};animationSettings[settings.direction]=$strip.css(settings.direction).replace('px','').replace('auto','0')-distance;return{'css':animationSettings,'time':timeToComplete};}
function moveFirstElement($strip){var settings=$strip.data('settings')||{direction:"left"};$strip.css('transition-duration','0s').css(settings.direction,'0');var $first=$strip.children().first();if($first.hasClass('webticker-init'))
$first.remove();else
$strip.children().last().after($first);}
function css3Scroll($strip,moveFirst){if(typeof moveFirst==='undefined')
moveFirst=false;if(moveFirst){moveFirstElement($strip);}
var options=animationSettings($strip);var time=options.time/1000;time+='s';$strip.css(options.css).css('transition-duration',time);}
function updaterss(rssurl,type,$strip){var list=[];$.get(rssurl,function(data){var $xml=$(data);$xml.find("item").each(function(){var $this=$(this),item={title:$this.find("title").text(),link:$this.find("link").text()}
listItem="<li><a href='"+item.link+"'>"+item.title+"</a></li>";list+=listItem;});$strip.webTicker('update',list,type);});}
function initalize($strip){if($strip.children('li').length<1){if(window.console){}
return false;}
var settings=$strip.data('settings');settings.duplicateLoops=settings.duplicateLoops||0;$strip.width('auto');var stripWidth=0;$strip.children('li').each(function(){stripWidth+=$(this).outerWidth(true);});if(stripWidth<$strip.parent().width()||$strip.children().length==1){if(settings.duplicate){itemWidth=Math.max.apply(Math,$strip.children().map(function(){return $(this).width();}).get());var duplicateLoops=0;while(stripWidth-itemWidth<$strip.parent().width()||$strip.children().length==1||duplicateLoops<settings.duplicateLoops){var listItems=$strip.children().clone();$strip.append(listItems);stripWidth=0;$strip.children('li').each(function(){stripWidth+=$(this).outerWidth(true);});itemWidth=Math.max.apply(Math,$strip.children().map(function(){return $(this).width();}).get());duplicateLoops++;}
settings.duplicateLoops=duplicateLoops;}else{var emptySpace=$strip.parent().width()-stripWidth;emptySpace+=$strip.find("li:first").width();var height=$strip.find("li:first").height();$strip.append('<li class="ticker-spacer" style="width:'+emptySpace+'px;height:'+height+'px;"></li>');}}
if(settings.startEmpty){var height=$strip.find("li:first").height();$strip.prepend('<li class="webticker-init" style="width:'+$strip.parent().width()+'px;height:'+height+'px;"></li>');}
stripWidth=0;$strip.children('li').each(function(){stripWidth+=$(this).outerWidth(true);});$strip.width(stripWidth+200);widthCompare=0;$strip.children('li').each(function(){widthCompare+=$(this).outerWidth(true);});while(widthCompare>=$strip.width()){$strip.width($strip.width()+200);widthCompare=0;$strip.children('li').each(function(){widthCompare+=$(this).outerWidth(true);});}
return true;}
var methods={init:function(settings){settings=jQuery.extend({speed:50,direction:"left",moving:true,startEmpty:true,duplicate:false,rssurl:false,hoverpause:true,rssfrequency:0,updatetype:"reset"},settings);return this.each(function(){jQuery(this).data('settings',settings);var $strip=jQuery(this);$strip.addClass("newsticker");var $mask=$strip.wrap("<div class='mask'></div>");$mask.after("<span class='tickeroverlay-left'>&nbsp;</span><span class='tickeroverlay-right'>&nbsp;</span>")
var $tickercontainer=$strip.parent().wrap("<div class='tickercontainer'></div>");var started=initalize($strip);if(settings.rssurl){updaterss(settings.rssurl,settings.type,$strip);if(settings.rssfrequency>0){window.setInterval(function(){updaterss(settings.rssurl,settings.type,$strip);},settings.rssfrequency*1000*60);}}
if(cssTransitionsSupported){$strip.css('transition-duration','0s').css(settings.direction,'0');if(started){css3Scroll($strip,false);}
$strip.on('transitionend webkitTransitionEnd oTransitionEnd otransitionend',function(event){if(!$strip.is(event.target)){return false;}
css3Scroll($(this),true);});}else{if(started){scrollitems($(this));}}
if(settings.hoverpause){$strip.hover(function(){if(cssTransitionsSupported){var currentPosition=$(this).css(settings.direction);$(this).css('transition-duration','0s').css(settings.direction,currentPosition);}else
jQuery(this).stop();},function(){if(jQuery(this).data('settings').moving){if(cssTransitionsSupported){css3Scroll($(this),false);}else{scrollitems($strip);}}});}});},stop:function(){var settings=$(this).data('settings');if(settings.moving){settings.moving=false;return this.each(function(){if(cssTransitionsSupported){var currentPosition=$(this).css(settings.direction);$(this).css('transition-duration','0s').css(settings.direction,currentPosition);}else
$(this).stop();});}},cont:function(){var settings=$(this).data('settings')
if(!settings.moving){settings.moving=true;return this.each(function(){if(cssTransitionsSupported){css3Scroll($(this),false);}else{scrollitems($(this));}});}},update:function(list,type,insert,remove){type=type||"reset";if(typeof insert==='undefined')
insert=true;if(typeof remove==='undefined')
remove=false;if(typeof list==='string'){list=$(list);}
var $strip=$(this);$strip.webTicker('stop');var settings=$(this).data('settings');if(type=='reset'){$strip.html(list);$strip.css(settings.direction,'0');initalize($strip);}else if(type=='swap'){if(window.console){console.log('trying to update');}
if($strip.children('li').length<1){$strip.html(list);$strip.css(settings.direction,'0');initalize($strip);}else{$strip.children('li').addClass('old');for(var i=0;i<list.length;i++){id=$(list[i]).data('update');match=$strip.find('[data-update="'+id+'"]');if(match.length<1){if(insert){if($strip.find('.ticker-spacer:first-child').length==0&&$strip.find('.ticker-spacer').length>0){$strip.children('li.ticker-spacer').before(list[i]);}
else{$strip.append(list[i]);}}}else $strip.find('[data-update="'+id+'"]').replaceWith(list[i]);;};$strip.children('li.webticker-init, li.ticker-spacer').removeClass('old');if(remove)
$strip.children('li').remove('.old');stripWidth=0;$strip.children('li').each(function(){stripWidth+=$(this).outerWidth(true);});$strip.width(stripWidth+200);}}
$strip.webTicker('cont');}};$.fn.webTicker=function(method){if(methods[method]){return methods[method].apply(this,Array.prototype.slice.call(arguments,1));}else if(typeof method==='object'||!method){return methods.init.apply(this,arguments);}else{$.error('Method '+method+' does not exist on jQuery.webTicker');}};})(jQuery);