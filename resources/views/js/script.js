function isValidCPF() {
    let campoCPF = document.getElementById("campoCPF").value
    if (typeof campoCPF !== "string") return false
    campoCPF = campoCPF.replace(/[\s.-]*/igm, '')

    if (
        !campoCPF ||
        campoCPF.length != 11 ||
        campoCPF == "00000000000" ||
        campoCPF == "11111111111" ||
        campoCPF == "22222222222" ||
        campoCPF == "33333333333" ||
        campoCPF == "44444444444" ||
        campoCPF == "55555555555" ||
        campoCPF == "66666666666" ||
        campoCPF == "77777777777" ||
        campoCPF == "88888888888" ||
        campoCPF == "99999999999" 
    ) {
        return false
    }
    var soma = 0
    var resto
    for (var i = 1; i <= 9; i++) 
        soma = soma + parseInt(campoCPF.substring(i-1, i)) * (11 - i)
    resto = (soma * 10) % 11
    if ((resto == 10) || (resto == 11))  resto = 0
    if (resto != parseInt(campoCPF.substring(9, 10)) ) return false
    soma = 0
    for (var i = 1; i <= 10; i++) 
        soma = soma + parseInt(campoCPF.substring(i-1, i)) * (12 - i)
    resto = (soma * 10) % 11
    if ((resto == 10) || (resto == 11))  resto = 0
    if (resto != parseInt(campoCPF.substring(10, 11) ) ) return false
    return true
}