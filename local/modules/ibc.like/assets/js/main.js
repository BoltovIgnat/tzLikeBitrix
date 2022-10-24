(function () {
    /*if (typeof (BX.Crm.EntityDetailManager) !== "undefined") {
        //console.log('ibc', BX.Crm.EntityDetailManager.items);
        //et tabManager = BX.Crm.EntityDetailManager.items['deal_11_details']._tabManager;

    }*/
    $('.ibc-create-contract-income').unbind('click');
    $(document).on('click','.ibc-create-contract-income',function(event){
        console.log( "Handler for .click() called." );
    });

}());

