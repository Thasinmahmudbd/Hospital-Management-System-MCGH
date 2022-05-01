
var dropdownSpecialty;
var addNewSpecialty;
var dropdownDepartment;
var addNewDepartment;
var docSection;
var docSectionHeader;
var creditG;
var debitG;
var incomeG;
var creditGHeader;
var debitGHeader;
var incomeGHeader;

function showSpecialtyDropdown() {

    dropdownSpecialty = document.getElementById("dropdownSpecialty");
    addNewSpecialty = document.getElementById("addNewSpecialty");
    dropdownSpecialty.style.display = "grid";
    addNewSpecialty.style.display = "none";

}

function showSpecialtyInput() {

    dropdownSpecialty = document.getElementById("dropdownSpecialty");
    addNewSpecialty = document.getElementById("addNewSpecialty");
    dropdownSpecialty.style.display = "none";
    addNewSpecialty.style.display = "grid";

}

function showDepartmentDropdown() {

    dropdownDepartment = document.getElementById("dropdownDepartment");
    addNewDepartment = document.getElementById("addNewDepartment");
    dropdownDepartment.style.display = "grid";
    addNewDepartment.style.display = "none";

}

function showDepartmentInput() {

    dropdownDepartment = document.getElementById("dropdownDepartment");
    addNewDepartment = document.getElementById("addNewDepartment");
    dropdownDepartment.style.display = "none";
    addNewDepartment.style.display = "grid";

}

function extraDocForm() {

    docSection = document.getElementById("docSection");
    docSectionHeader = document.getElementById("docSectionHeader");
    docSection.style.display = "grid";
    docSectionHeader.style.display = "block";

}

function normalForm() {

    docSection = document.getElementById("docSection");
    docSectionHeader = document.getElementById("docSectionHeader");
    docSection.style.display = "none";
    docSectionHeader.style.display = "none";

}

function onChange(value) {

    if(value==="doctors"){
        docSection = document.getElementById("docSection");
        docSectionHeader = document.getElementById("docSectionHeader");
        docSection.style.display = "grid";
        docSectionHeader.style.display = "block";
    }else{
        docSection = document.getElementById("docSection");
        docSectionHeader = document.getElementById("docSectionHeader");
        docSection.style.display = "none";
        docSectionHeader.style.display = "none";
    }

}


function creditGraph() {

    creditG = document.getElementById("creditG");
    debitG = document.getElementById("debitG");
    incomeG = document.getElementById("incomeG");
    creditG.style.display = "grid";
    debitG.style.display = "none";
    incomeG.style.display = "none";

    creditGHeader = document.getElementById("creditGHeader");
    debitGHeader = document.getElementById("debitGHeader");
    incomeGHeader = document.getElementById("incomeGHeader");
    creditGHeader.style.display = "grid";
    debitGHeader.style.display = "none";
    incomeGHeader.style.display = "none";

}

function debitGraph() {

    creditG = document.getElementById("creditG");
    debitG = document.getElementById("debitG");
    incomeG = document.getElementById("incomeG");
    creditG.style.display = "none";
    debitG.style.display = "grid";
    incomeG.style.display = "none";

    creditGHeader = document.getElementById("creditGHeader");
    debitGHeader = document.getElementById("debitGHeader");
    incomeGHeader = document.getElementById("incomeGHeader");
    creditGHeader.style.display = "none";
    debitGHeader.style.display = "grid";
    incomeGHeader.style.display = "none";

}

function incomeGraph() {

    creditG = document.getElementById("creditG");
    debitG = document.getElementById("debitG");
    incomeG = document.getElementById("incomeG");
    creditG.style.display = "none";
    debitG.style.display = "none";
    incomeG.style.display = "grid";

    creditGHeader = document.getElementById("creditGHeader");
    debitGHeader = document.getElementById("debitGHeader");
    incomeGHeader = document.getElementById("incomeGHeader");
    creditGHeader.style.display = "none";
    debitGHeader.style.display = "none";
    incomeGHeader.style.display = "grid";

}

