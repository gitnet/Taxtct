jQuery.fn.extend({WAFloatBox:function(){var a=$(this)
a.prepend(`
        <div class="myk-btn">
            <img src="assets/wa-icon.png" class="myk-wa-icon">
        </div>
        <div class="myk-panel"></div>
        `)
var b=$(".myk-panel")
b.append(`
        <div class="myk-panelhead">
            <span class="myk-close">x</span>
                <img src="assets/wa-icon.png" class="myk-wa-icon" width="30px">
            <h2 class="myk-paneltitle">Questions? </h2>
        </div>
        <div class="myk-panelbody"></div>
        `)
$('.myk-item').each(function(){$('.myk-panelbody').append(`
        <a target='_blank' href="https://wa.me/${$(this).data('wanumber')}?text=Please send us %0aFullName:%0aId Card:%0aCountry:%0a" class="myk-list">
            <img src="${$(this).data('waava')}" class="myk-ava">
            <div class="myk-number">
                <p class="myk-who"><b>${$(this).data('wadivision')}</b></p>
                <p class="myk-name">${$(this).data('waname')}</p>
            </div>
        </a>
        `)});$(".myk-btn").click(function(){$(".myk-panel").toggleClass("myk-show");});$(".myk-close").click(function(){$(".myk-panel").toggleClass("myk-show");});}});