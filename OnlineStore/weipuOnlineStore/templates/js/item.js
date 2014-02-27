//用来处理商品界面的逻辑

function $(id) {
	return document.getElementById(id);
}

//切换商品详情和评价
function m_switch(obj){
	var shop=$('shop');
	var pl=$('pl');
	shop.style.display="none";
	pl.style.display="none";
	
	var spxq=$('spxq');
	var yhpl=$('yhpl');
	spxq.style.backgroundColor="transparent";
	yhpl.style.backgroundColor="transparent";
	
	obj.style.backgroundColor="#F09500";
	
	switch(obj.id){
	case 'spxq':
		shop.style.display="block";
		break;
	case 'yhpl':
		pl.style.display="block";
		break;
	}
	
	
	
	
}
