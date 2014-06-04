var zf2ollection = {
	'init' : function() {
		/* initialize code */
		jQuery('#Content').validate();
		
		zf2ollection.manageRemoveElement2Button();
		zf2ollection.manageRemoveElement3Button();
	},
	'manageRemoveElement2Button': function(){
		if(jQuery('#elementContainer').children('fieldset').length == 1){
			jQuery('.removeElement2').hide();
		}else{
			jQuery('.removeElement2').show();
		}
	},
	'manageRemoveElement3Button': function(obj, action){
		
		if(jQuery.type( obj ) === "undefined"){
			jQuery('#elementContainer').children('fieldset').children('fieldset').each(function(index, val) {
				if(jQuery(this).parent().children('fieldset').length <= 1){
					jQuery('.removeElement3', jQuery(this)).hide();
				}
			});
		}else{
			
			var totalFactors = obj.parent().children('fieldset').length;
			
			if(jQuery.type( action ) !== "undefined" && action == 'remove'){
				totalFactors = totalFactors - 1;
			}
			
			if(totalFactors <= 1){
				jQuery('.removeElement3', obj.parent().children('fieldset')).hide();
			}else{
				jQuery('.removeElement3', obj.parent().children('fieldset')).show();
			}
		}
	}
}

jQuery(document).ready(function() {
	zf2ollection.init();
});

function addElement2(obj){
	var targetObj = jQuery(obj);
	var currentCount = jQuery('#elementContainer').children('fieldset').length;	
	var template = jQuery('#elementContainer').children('span').data('template');
	template = template.replace(/__element2Index__/g, currentCount);
	jQuery('#elementContainer').children('fieldset').last().after(template);
	manageIElement2Heading();
	zf2ollection.manageRemoveElement3Button();
	zf2ollection.manageRemoveElement2Button();
	return false;
}

function addElement3(obj) {
	var targetObj = jQuery(obj);
	var currentCount = targetObj.parent().find('fieldset').length;
	var template = targetObj.parent().children('span').data('template');
	template = template.replace(/__element3Index__/g, currentCount);
	targetObj.parent().children('fieldset').last().after(template);
	manageElement3Heading(targetObj);
	zf2ollection.manageRemoveElement3Button(targetObj, 'add');
	return false;
}

function removeElement3(obj) {

	var c = confirm('Do you want to remove element 3?');
	if (c) {
		var targetObj = jQuery(obj);
		var itemObject = targetObj.parent().parent();
		var itemIndex = itemObject.index();
		zf2ollection.manageRemoveElement3Button(targetObj.parent(), 'remove');
		targetObj.parent().remove();
		manageElement3Heading(targetObj);
		rearrangeElements3(itemObject, itemIndex);	
	}
	return false;
}

function removeElement2(obj) {

	var c = confirm('Do you want to remove element 2?');
	if (c) {
		var targetObj = jQuery(obj);
		var itemObject = targetObj.parent();
		itemObject.remove();
		rearrangeElements2();
		manageIElement2Heading();
		zf2ollection.manageRemoveElement2Button();
	}
	return false;
}

function manageElement3Heading(targetObj) {
	jQuery('fieldset', targetObj.parent()).each(function(index, val) {
		jQuery('legend', jQuery(this)).html('Entity 3 : ' + (index + 1));
	});
}

function manageIElement2Heading() {
	jQuery('#elementContainer').children('fieldset').each(function(index, val) {
		jQuery('legend:eq(0)', jQuery(this)).html('Entity 2 : ' + (index + 1));
	});
}

function rearrangeElements2() {
	var elementName = '';
	var itemObject = null;
	jQuery('#elementContainer').children('fieldset').each(function(itemIndex, val){
		itemObject = jQuery(this);
		elementName = jQuery('.element2', itemObject).attr('name');
		elementName = elementName.replace(/\[elements2\]\[\d+\]/, '[elements2][' + itemIndex + ']');
		jQuery('.element2', itemObject).attr('name', elementName);
		rearrangeElements3(itemObject, itemIndex);
	});
}

function rearrangeElements3(itemObject, element2Index) {
	var elementName = '';
	itemObject.children('fieldset').each(function(element3Index, val){
		elementName = jQuery('.element3', jQuery(this)).attr('name');
		elementName = elementName.replace(/\[elements2\]\[\d+\]/, '[elements2][' + element2Index + ']');
		elementName = elementName.replace(/\[elements3\]\[\d+\]/, '[elements3][' + element3Index + ']');
		jQuery('.element3', jQuery(this)).attr('name', elementName);
	});
}