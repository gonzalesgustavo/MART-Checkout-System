$(document).ready(function() {
    $("#btnAddItem").click(addItem);
    //$("#btnEditItem").click(editItem);
    $("#btnViewItems").click(viewList);
    $("#btnUpdate").click(editConfirm);
    $("#btnDelete").click(deleteConfirm);

    populateList();

    setShowElement("#editItemDiv", false);
    setShowAllAdd(false);
    setShowList(false);

    $('#select').on('change', function(event) {
        var val = $(this).val();
        console.log("val: " + val);

        $.ajax({
            url: "edit_item.php",
            type: "POST",
            dataType: "text",
            data: {sku: val},
            success: (function (data) {
                console.log("data: " + data);
                setShowElement("#editItemDiv", true);
                $('#editItemDiv').html(data)
            })

        });

    });

});



function addItem() {
    console.log("Add Item Mode...");
    // $.post('add_item.php', function (data) {
    //     itemNumberDiv.innerHTML = data;
    // });
    setShowElement("#addItemDiv", true);
    setShowElement("#editItemDiv", false);
    setShowList(false);
}

function populateList() {

    $(document).ready(function () {
        $.post('getEquip.php', function(data) {
            result = data;
            handleJSON(data);
            //infoDiv.innerHTML = result;
        })
    })
}

function viewList() {
    console.log("View List Mode...");
    setShowElement("#addItemDiv", false);
    setShowList(true);



}

function handleJSON(json) {
    var equipments = {};

    //turns json into an object
    var pJSON = $.parseJSON(json);

    //no results are found
    if(pJSON.length == 0) {
        console.log("No results");
        console.log("Length: " + pJSON.length)
    } else {
        objLength = pJSON.length;

        //console log for testing
        // console.log(json);

        // console.log();
        // console.log(pJSON);

        for (i = 0; i < objLength; i++) {
            var eqp = pJSON[i];
            equipments[i] = eqp;
        }

        //console.log("Equipment Dictionary (length: " + Object.keys(equipments).length)
        //barCode = pJSON[0].barcode;
        //console.log("Bar Code: " + barCode);

    }

    populateEquipDropDown(equipments);

}

function populateEquipDropDown(equipments) {

    var select = document.getElementById("select");

    // var defOption = document.createElement("option");
    // defOption.textContent = "Select an Item...";
    // select.appendChild(defOption);

    dLength = Object.keys(equipments).length;
    var equip;

    for ( var i = 0; i < dLength; i++) {
        equip = equipments[i];
        var el = document.createElement("option");
        el.textContent = equip["item name"] + " (" + equip["barcode"] + ")";
        el.value = equip["barcode"];

        select.appendChild(el);
    }

}

function addSubmitForm() {
    //alert("called");

    //gets values for required fields
    var a = document.forms["addItemForm"]["sku"].value;
    var b = document.forms["addItemForm"]["iName"].value;

    console.log("a= " + a + " | b= " + b);

    //checks for blank fields
    if (a == null || a == "", b == null || b == "") {
        alert("Please fill out required fields");
        return false;
    } else {

        var str = $("#addItemForm").serialize();
        console.log(str);

        $.ajax({
            url: "add_item.php",
            type: "POST",
            data: str,
            success: (function () {
                alert("Item ADDED to database.");
                document.getElementById("addItemForm").reset();
            })
        });
    }
}

function editConfirm() {
    var message = "are you sure";
    if(confirm(message) == true) {
        //load edit_item_confirm.php

    } else {
        //load nothing
    }
    
}

function deleteConfirm() {

}

function setShowElement(elementID, bShow) {
    if (bShow == true) {
        $(elementID).show();
    } else {
        $(elementID).hide();
    }
}

function setShowAllAdd(bShow) {
    if (bShow == true) {
        $("#addItemDiv").show();
        //$("#addItemForm").show();
    } else {
        $("#addItemDiv").hide();
        //$("#addItemForm").hide();
    }
}

function setShowList(bShow) {
    if (bShow == true) {
        $("#selectItemDiv").show();
    } else {
        $("#selectItemDiv").hide();
    }
}
