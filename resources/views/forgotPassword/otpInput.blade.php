<style>
    .otp-container {
        /* margin: auto; */
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
        width: fit-content;
        text-align: center;
        margin: 1em auto;
    }

    h4 {
        font-size: 1.25rem;
        color: #333;
        font-weight: 500;
    }

    form .input-field {
        flex-direction: row;
        column-gap: 10px;
    }

    .input-field input {
        height: 45px;
        width: 42px;
        border-radius: 6px;
        outline: none;
        font-size: 1.125rem;
        text-align: center;
        border: 1px solid #ddd;
    }

    .input-field input:focus {
        box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
    }

    .input-field input::-webkit-inner-spin-button,
    .input-field input::-webkit-outer-spin-button {
        display: none;
    }

    .otp-btn {
        margin-top: 25px;
        /* width: 10%; */
        color: #fff;
        font-size: 1rem;
        border: none;
        padding: .5em 1.5em;
        cursor: pointer;
        border-radius: 6px;
        pointer-events: none;
        background: #000;
        /* transition: all 0.2s ease; */
    }

    /* form button.active {
        background: #4070f4;
        pointer-events: auto;
    }

    form button:hover {
        background: #0e4bf1;
    } */
</style>

<div class="otp-container">

    <h4>Enter OTP Code</h4>
    <form id="formIdOtp">
        <div class="input-field">
            <input class="input" type="number" name="value1" />
            <input class="input" type="number" name="value2" disabled />
            <input class="input" type="number" name="value3" disabled />
            <input class="input" type="number" name="value4" disabled />
            {{-- <input type="button" onclick="ok()" value="click me" class="btn btn-primary"> --}}
            {{-- <button type="button" onclick="ok()" class="otp-btn">Verify OTP</button> --}}
        </div>
        <input type="button" value="Verify" onclick="resetPassword('{{ route('forgot.verification') }}','POST','formIdOtp' ,'resetPasswordForm','otp-num')" class="btn btn-primary mt-3 otp-num" >
    </form>
</div>

<script>
    const inputs = document.querySelectorAll(".input");
        // button = document.querySelector("button");

    // iterate over all inputs
    inputs.forEach((input, index1) => {
        input.addEventListener("keyup", (e) => {
            // This code gets the current input element and stores it in the currentInput variable
            // This code gets the next sibling element of the current input element and stores it in the nextInput variable
            // This code gets the previous sibling element of the current input element and stores it in the prevInput variable
            const currentInput = input,
                nextInput = input.nextElementSibling,
                prevInput = input.previousElementSibling;

            // if the value has more than one character then clear it
            if (currentInput.value.length > 1) {
                currentInput.value = "";
                return;
            }
            // if the next input is disabled and the current value is not empty
            //  enable the next input and focus on it
            if (nextInput && nextInput.hasAttribute("disabled") && currentInput.value !== "") {
                nextInput.removeAttribute("disabled");
                nextInput.focus();
            }

            // if the backspace key is pressed
            if (e.key === "Backspace") {
                // iterate over all inputs again
                inputs.forEach((input, index2) => {
                    // if the index1 of the current input is less than or equal to the index2 of the input in the outer loop
                    // and the previous element exists, set the disabled attribute on the input and focus on the previous element
                    if (index1 <= index2 && prevInput) {
                        input.setAttribute("disabled", true);
                        input.value = "";
                        prevInput.focus();
                    }
                });
            }
            //if the fourth input( which index number is 3) is not empty and has not disable attribute then
            //add active class if not then remove the active class.
            // if (!inputs[3].disabled && inputs[3].value !== "") {
            //     button.classList.add("active");
            //     return;
            // }
            // button.classList.remove("active");
        });
    });

   
    //focus the first input which index is 0 on window load
    window.addEventListener("load", () => inputs[0].focus());



   
</script>
