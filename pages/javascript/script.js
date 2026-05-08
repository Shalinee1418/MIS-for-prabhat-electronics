
function calculate() {
    let quantity = document.getElementById("quantity").value;
    let rate = document.getElementById("rate").value;
    let gst = document.getElementById("gst").value;

    let amount = qty * rate;
    let cgst = (amount * (gst / 2)) / 100;
    let sgst = (amount * (gst / 2)) / 100;
    let total = amount + cgst + sgst;

    document.getElementById("result").innerHTML =
        "Total: ₹" + total;
}

