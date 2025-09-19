$(".box__wraper").hide()

$(".chat__input").keypress(function (e) {
    if (e.which === 13) $("#button-submit").click();
})

$("#button-submit").click(function () {

    $(".box__wraper").show()
    $(".box__greeting").hide()

    let message = $(".chat__input").val().trim()
    if (message === "") return;

    let boxChat = $(".box__chat");

    // Tambah message ke tampilan
    boxChat.append(`<div class="user-chat">${message}</div>`)
    boxChat.scrollTop(boxChat[0].scrollHeight);
    anime({
        targets: '.user-chat:last-child',
        translateX: [-50, 0],
        opacity: [0, 1],
        duration: 3500,
        easing: 'easeOutExpo'
    });
    $(".chat__input").val("")

    $.ajax({
        url: "/lomba_v2/app/action/ai.php",
        method: "POST",
        data: {
            message: message
        },
        beforeSend: function () {
            $(".chat__input").attr("disabled", true)
            $("#button-submit").attr("disabled", true)
            boxChat.append(`<div class="ai-chat" id="loading-chat">
                                <lottie-player
                                    class="ai-chat-lottie"
                                    src="assets/icons/star.json"
                                    background="transparent"
                                    speed="1"
                                    loop
                                    autoplay>
                                </lottie-player>
                                <span class="ai-chat-message">Thinking for answer...</span>
                            </div>`)
            boxChat[0].scrollTo({
                top: boxChat[0].scrollHeight,
                behavior: 'smooth'
            })
        },
        success: function (response) {
            // Hapus Loading
            $("#loading-chat").remove();

            $(".chat__input").attr("disabled", false)
            $("#button-submit").attr("disabled", false)
            let messageAI = marked.parse(JSON.parse(response).reply)
            boxChat.append(`<div class="ai-chat">
                                <lottie-player
                                    class="ai-chat-lottie"
                                    src="assets/icons/star.json"
                                    background="transparent"
                                    speed="1"
                                    autoplay>
                                </lottie-player>
                                <span class="ai-chat-message">${messageAI}</span>
                            </div>`)
            boxChat[0].scrollTo({
                top: boxChat[0].scrollHeight,
                behavior: 'smooth'
            })
            anime({
                targets: '.ai-chat:last-child .ai-chat-message',
                translateX: [50, 0],
                opacity: [0, 1],
                duration: 3500,
                easing: 'easeOutExpo'
            });
        }
    })
})

anime.timeline({
        loop: false
    })
    .add({
        targets: '.letter',
        opacity: [0, 1],
        translateY: [50, 0],
        easing: "easeOutExpo",
        duration: 7500,
        delay: (el, i) => 30 * i
    })
    .add({
        targets: '.chat-box',
        opacity: [0, 1],
        translateY: [50, 0],
        easing: "easeOutExpo",
        duration: 1000,
    }, '-=7000')