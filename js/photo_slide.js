$(document).ready(function(){

	$('#gizle').click(function(){	//panel de tamam a basınca
		$('.container').css('display','none');
		$('#mesaj').slideUp(300);
		$('body').css('overflow-y','scroll');
	});

		$('#goster').click(function(){
		$('#mesaj').slideDown(300);//header upload tuşunun tıklanma eventi
		$('.container').css('display','block');
		$('body').css('overflow-y','hidden');
	})
})
