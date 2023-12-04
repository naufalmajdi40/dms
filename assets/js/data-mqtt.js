var host = "203.194.112.238";
var port = 8083;
var userId = "das";
var passwordId = "mgi2023";
var coba = "80deg";
var grafikData;
var datacoba;
// /startConnect()

function startConnect() {
    clientID = "dms-" + parseInt(Math.random() * 100);
    client = new Paho.MQTT.Client(host, Number(port), clientID);
    $("#mdbusChartIA").attr("data-ratio", coba);
    client.onConnectionLost = onConnectionLost;
    client.onMessageArrived = onMessageArrived;

    client.connect({
        onSuccess: onConnect,
        // userName: userId,
        // passwordId: passwordId,
    });
}

function onConnect() {
    topic = "DMS/#";
    client.subscribe(topic);
}

function onConnectionLost(responseObject) {
    startConnect()
        //alert("disconnect")
        // document.getElementById("messages").innerHTML +=
        //     "<span> ERROR: Connection is lost.</span><br>";
        // if (responseObject != 0) {
        //     document.getElementById("messages").innerHTML +=
        //         "<span> ERROR:" + responseObject.errorMessage + "</span><br>";
        // }
}


function timeConverter(UNIX_timestamp) {
    let date = new Date(parseInt(UNIX_timestamp))
    var date_string = date.toLocaleString('en-GB');

    return date_string;
}

function onMessageArrived(message) {
    // console.log("OnMessageArrived: " + message.payloadString);

    dataMon = JSON.parse($('#monitorData').text())
    parsemsg = JSON.parse(message.payloadString)
    parseDest = message.destinationName.split("/")
    machine_code = (parseDest[1])
    id_device = (parseDest[3])
    item_id = (parseDest[4])
    alias = parsemsg.alias
        //console.log(parseDest)

    for (let i = 0; i < dataMon.length; i++) {
        if (dataMon[i].id_device == id_device && dataMon[i].machine_code == machine_code && dataMon[i].alias == alias) {
            if (parsemsg.dataType == "float" || parsemsg.dataType == "integer") {
                let val = parseFloat(parsemsg.val)
                if (parsemsg.dataType == "float") {
                    $(`#val_${machine_code}_${id_device}_${alias}`).text(val.toFixed(3))

                    $(`#dtx_${machine_code}_${id_device}_${alias}`).text(val.toFixed(3))
                    console.log(`#dtx_${machine_code}_${id_device}_${alias}`)
                } else {
                    val = parseInt(parsemsg.val)
                    $(`#val_${machine_code}_${id_device}_${alias}`).text(val)
                    $(`#dtx_${machine_code}_${id_device}_${alias}`).text(val)
                }
                max_val = dataMon[i].max_value
                    //console.log(dataMon[i])

                const deg = (val / max_val) * 180;
                try {
                    document
                        .getElementById(`dt_${machine_code}_${id_device}_${alias}`)
                        .style.setProperty("--rotation", deg + "deg");
                } catch (err) {
                    console.log(err)
                }
            } else if (parsemsg.dataType == "boolean") {
                let val = parsemsg.val
                $(`#val_${machine_code}_${id_device}_${alias}`).text(parsemsg.val)
                if (val == "True") {
                    $(`#dt_${machine_code}_${id_device}_${alias}`).removeClass("l-second")
                    $(`#dt_${machine_code}_${id_device}_${alias}`).addClass("l-red")

                } else {
                    $(`#dt_${machine_code}_${id_device}_${alias}`).removeClass("l-red")
                    $(`#dt_${machine_code}_${id_device}_${alias}`).addClass("l-second")

                }
            } else if (parsemsg.dataType == "visible-string") {

                let val = parsemsg.val
                $(`#val_${machine_code}_${id_device}_${alias}`).text(val)

            } else if (parsemsg.dataType == "utc-time") {
                $(`#val_${machine_code}_${id_device}_${alias}`).removeClass("info-box-number")
                let val = timeConverter(parsemsg.val)
                $(`#val_${machine_code}_${id_device}_${alias}`).text(val)
            }
        }
    }
}

function startDisconnect() {
    client.disconnect();
    document.getElementById("messages").innerHTML +=
        "<span> Disconnected. </span><br>";
}

function publishMessage() {
    msg = document.getElementById("Message").value;
    topic = document.getElementById("topic_p").value;

    Message = new Paho.MQTT.Message(msg);
    Message.destinationName = topic;

    client.send(Message);
    document.getElementById("messages").innerHTML +=
        "<span> Message to topic " + topic + " is sent </span><br>";
}