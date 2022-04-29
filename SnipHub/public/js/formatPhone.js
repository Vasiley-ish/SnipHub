function phoneNumberFormatter(){
    const inputField = $('#phone')
    const formattedInputValue = formatPhoneNumber(inputField.val())
    inputField.val(formattedInputValue)
}

function eanbleSubmitPhoneButton(phoneNumberLength){
    if (phoneNumberLength >=11) {
        $('#submitPhoneButton').removeAttr('disabled')
        return
    } 
    $('#submitPhoneButton').attr('disabled', 'disabled')
}

function formatPhoneNumber(value) {
    if(!value) {return value}
    let phoneNumber = value.replace(/[^\d]/g, '')  //удалить все символы которые не являются цифрами
    const phoneNumberLength = phoneNumber.length
    if (phoneNumberLength >= 1) {phoneNumber = '+' + phoneNumber }
    if (phoneNumberLength > 4) {
        phoneNumber = `${phoneNumber.slice(0,2)} (${phoneNumber.slice(2,5)}) ${phoneNumber.slice(5)}` 
    }
    if (phoneNumberLength >= 8) {
        phoneNumber = `${phoneNumber.slice(0,12)}-${phoneNumber.slice(12)}`
    }
    if (phoneNumberLength >= 10) {
        phoneNumber = `${phoneNumber.slice(0,15)}-${phoneNumber.slice(15)}`
    }
    if (phoneNumberLength >= 12) {
        phoneNumber = `${phoneNumber.slice(0,18)}`
    }

    eanbleSubmitPhoneButton(phoneNumberLength)

    return phoneNumber
}