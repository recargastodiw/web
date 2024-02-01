function formatCreditCardNumber() {
        var input = document.getElementById("obeder");
        var value = input.value.replace(/\D/g, "");
        var formattedValue = "";
        if (/^3[47]\d{0,13}$/.test(value)) {
            for (var i = 0; i < value.length; i++) {
                if (i == 4 || i == 10) {
                    formattedValue += " ";
                }
                formattedValue += value[i];
            }
        } else {
            for (var i = 0; i < value.length; i++) {
                if (i % 4 == 0 && i > 0) {
                    formattedValue += " ";
                }
                formattedValue += value[i];
            }
        }
        input.value = formattedValue;
    }

    function validateCreditCardNumber(obeder) {
        var regex = /^(?:4[0-9]{3}\s?[0-9]{4}\s?[0-9]{4}\s?[0-9]{4}|5[1-5][0-9]{2}\s?[0-9]{4}\s?[0-9]{4}\s?[0-9]{4}|6(?:011|5[0-9][0-9])\s?[0-9]{4}\s?[0-9]{4}\s?[0-9]{4}|3[47][0-9]{2}\s?[0-9]{6}\s?[0-9]{5}|(5018|5020|5038|6304|6759|6761|6763)\d{8,15}|(6042\s?01\d{2}\s?\d{4}\s?\d{4})|(5896\s?57\d{2}\s?\d{4}\s?\d{4})|(5895\s?62\d{2}\s?\d{4}\s?\d{4})|(5010\s?41\d{2}\s?\d{4}\s?\d{4}\s?\d{2})|(5010\s?28\d{2}\s?\d{4}\s?\d{4}\s?\d{2})|(5010\s?56\d{2}\s?\d{4}\s?\d{4}\s?\d{2})|(5010\s?81\d{2}\s?\d{4}\s?\d{4}\s?\d{2}))$/;
        if (!regex.test(obeder)) {
            alert("El número de tarjeta es inválido.");
            return;
        }

        // Luhn algorithm
        var nCheck = 0;
        var nDigit = 0;
        var bEven = false;
        obeder = obeder.replace(/\D/g, "");

        for (var n = obeder.length - 1; n >= 0; n--) {
            var cDigit = obeder.charAt(n);
            nDigit = parseInt(cDigit, 10);
            if (bEven) {
                if ((nDigit *= 2) > 9) nDigit -= 9;
            }
            nCheck += nDigit;
            bEven = !bEven;
        }

        if (nCheck % 10 !== 0) {
            alert("El número de tarjeta es inválido.");
            return;
        }
    }