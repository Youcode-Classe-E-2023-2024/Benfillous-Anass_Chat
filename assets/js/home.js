const memberList = document.getElementById("member-list");
const chatContent = document.getElementById("chat-content");
const profileSection = document.getElementById("profile-section");
const roomForm = document.getElementById("roomForm");

const myProfile = document.getElementById("myprofile");
const rooms = document.querySelectorAll(".rooms");
const addRoom = document.getElementById("addRoom");

myProfile.addEventListener("click", () => {
    memberList.style.display = "none";
    chatContent.classList.add("hidden");
    profileSection.classList.remove("hidden");
    roomForm.classList.add("hidden");
});
rooms.forEach((elm) => {
    elm.addEventListener("click", () => {
        memberList.style.display = "";
        chatContent.classList.remove("hidden");
        profileSection.classList.add("hidden");
        roomForm.classList.add("hidden");
    });
});

addRoom.addEventListener("click", () => {
    roomForm.classList.toggle("hidden");
});

const addRoomBtn = document.getElementById("addRoomBtn");

function createRoom(roomName, members) {
    $.ajax({
        type: "POST",
        url: "controllers/home_controller.php",
        data: {roomName, members},
        success: (data) => {
            roomForm.classList.add("hidden");
            displayRooms();
        }
    });
}

addRoomBtn.addEventListener("click", () => {
    if ($("#roomName").val() == "") {
        let errorMessage = "<p class='bg-gray-900 text-red-600 p-3'>You Can't Create Room Without Name</p>";
        roomForm.style.border = "1px solid red";
        roomForm.insertAdjacentHTML('afterbegin', errorMessage);
    } else
        createRoom($("#roomName").val(), $("#roomMembers").val())
})

const roomsSection = document.getElementById("rooms-section");
let defaultRoomId = 0;

const chatInput = document.getElementById("message-input");
let currentRoom = 0;
const dropDownBtn = document.getElementById("dropBtn");
const dropDownContainer = document.getElementById("dropDownContainer");

function getRoomId(roomId) {
    $.ajax({
        type: "POST",
        url: "controllers/home_controller.php",
        data: {roomId, req: "getRoomId"},
        success: (data) => {
            console.log(data);
        },
        error: (error) => {
            console.log(error);
        }
    })
}

function displayMemberList() {
    $.ajax({
        type: "POST",
        url: "controllers/home_controller.php",
        data: {req: "displayUsers"},
        success: (data) => {
            let memberData = JSON.parse(data);
            const roomMemberList = document.getElementById("inviteRoomMembers");
            roomMemberList.innerHTML = "";
            memberData.forEach((roomMember) => {
                roomMemberList.innerHTML += `<option value="${roomMember.user_id}"> ${roomMember.username}</option>`
            })
        }
    })
}

let creatorId = 0;

function displayRooms() {
    roomsSection.innerHTML = "";
    $.ajax({
        type: "POST",
        url: "controllers/home_controller.php",
        data: {req: "displayRooms"},
        success: function (data) {
            let roomsData = JSON.parse(data);
            roomsData.forEach((room, index) => {
                if (index === 0) {
                    defaultRoomId = room.room_id;
                }
                // Add a data attribute to store the room information
                roomsSection.innerHTML += `
                        <div class="room cursor-pointer mb-4 relative" data-room-name="${room.room_name}" data-room-creator="${room.creator}" data-room-id="${room.room_id}">
                            <div class="bg-white h-12 w-12 flex items-center justify-center text-black text-2xl font-semibold rounded-3xl mb-1 overflow-hidden">
                                <img src="https://cdn.discordapp.com/embed/avatars/1.png" alt="">
                            </div>
                            <div class="absolute hidden room-popup bg-white p-2 text-black text-sm font-semibold rounded shadow-md -mt-10 -ml-2" style="bottom: 20px; left: 20px;">
                                ${room.room_name}
                            </div>
                        </div>
                    `;
            });

            $("#rooms-section").off("click", ".room").on("click", ".room", function () {
                const roomId = $(this).data("room-id");
                const roomName = $(this).data("room-name");
                creatorId = $(this).data("room-creator");
                dropDownContainer.classList.remove("hidden");
                currentRoom = roomId;
                dropDownBtn.innerText = roomName + "'s Room";
                displayRoomMembers(currentRoom);
                displayChat(currentRoom);
                memberList.style.display = "";
                chatContent.classList.remove("hidden");
                profileSection.classList.add("hidden");
                roomForm.classList.add("hidden");

                getRoomId(currentRoom);
                displayMemberList();
            });
            document.querySelectorAll('.room').forEach((room) => {
                room.addEventListener('mouseenter', () => {
                    room.querySelector('.room-popup').classList.remove('hidden');
                });

                room.addEventListener('mouseleave', () => {
                    room.querySelector('.room-popup').classList.add('hidden');
                });
            });
        }
    });
}


const membersSection = document.getElementById("members-section");

function displayRoomMembers(roomId) {
    membersSection.innerHTML = "";
    $.ajax({
        type: "POST",
        url: "controllers/home_controller.php",
        data: {
            roomId,
            members: 1
        },
        success: (data) => {
            let membersData = JSON.parse(data);
            console.log(membersData);
            membersData.forEach((member) => {
                let imageAdmin = "";
                let ban = "";
                if (member.user_id == creatorId) {
                    imageAdmin += `<img src="assets/img/png-clipart-computer-icons-crown-crown-svg-free-black-crown-image-file-formats-king.png" class="cursor-pointer w-5 h-5 mx-3 rounded-3xl mr-3" alt="">`;
                } else if (creatorId == connected) {
                    ban = `<button
                            data-member-id="${member.user_id}"
                          class="btn-ban items-center bg-red-600 hover:bg-red-700 text-white text-xs font-medium rounded-md">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            className="h-4 w-4 mr-1"
                            fill="red"
                            viewBox="0 0 24 24"
                            stroke="white"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                            />
                          </svg>
                        </button>`;
                }

                membersSection.innerHTML += `<div class="flex flex-row items-center">
                            <div class="py-4 flex border-b border-gray-600">
                            <img src="assets/img/${member.picture}"
                            class="cursor-pointer w-10 h-10 rounded-3xl mr-3">
                            <span class="font-bold text-red-300 cursor-pointer hover:underline">${member.username}</span>${imageAdmin}</div>
                            <div class="ban-btn-section w-[30px] ml-4">
                                   ${ban}
                            </div>
                        </div>
                        `;
            });

            // Event binding outside the loop
            $(".ban-btn-section").off("click", ".btn-ban").on("click", ".btn-ban", function () {
                let memberId = $(this).data("member-id");
                banMember(memberId);
            });
        }
    });
}


const chatSection = document.getElementById("chat-section");

function displayChat(roomId) {
    console.log("Before displayRooms AJAX");
    chatSection.innerHTML = "";
    $.ajax({
            type: "POST",
            url: "controllers/home_controller.php",
            data: {roomId, chat: 1},
            success: (data) => {
                let chatData = JSON.parse(data);
                chatData.forEach((message) => {
                    let date = formatTimestamp(message.date);
                    chatSection.innerHTML += `
                                 <div class="border-b border-gray-600 py-3 flex items-start mb-4 text-sm">
                                    <img src="assets/img/${message.picture}"
                                         class="cursor-pointer w-10 h-10 rounded-3xl mr-3">
                                    <div class="flex-1 overflow-hidden">
                                        <div>
                                            <span class="font-bold text-red-300 cursor-pointer hover:underline">${message.username}</span>
                                            <span class="font-bold text-gray-400 text-xs">${date}</span>
                                        </div>
                                        <p class="text-white leading-normal">${message.message}</p>
                                    </div>
                                </div>`;
                })
                chatSection.scrollTop = chatSection.scrollHeight;
                console.log("After displayRooms AJAX");
            }
        }
    )
}

function writeChat(roomId, message) {
    $.ajax({
        type: "POST",
        url: "controllers/home_controller.php",
        data: {roomId, message},
        success: (response) => {
            console.log(response);
            chatInput.value = "";
            displayChat(roomId);
            console.log(roomId, message);
        }
    })

}

displayRooms();

/*setInterval(displayRooms, 1000);*/

/*let isFetchingData = false;

async function intervalDisplay() {
    if (!isFetchingData) {
        isFetchingData = true;

        try {
            await displayRooms();
            await displayChat(currentRoom);
            console.log(currentRoom);
        } catch (error) {
            console.error("Error:", error);
        } finally {
            isFetchingData = false;
        }
    }
}*/

chatInput.addEventListener("keypress", function (event) {
    // If the user presses the "Enter" key on the keyboard
    if (event.key === "Enter") {
        writeChat(currentRoom, chatInput.value);
    }
});


function formatTimestamp(timestamp) {
    // Convert timestamp to milliseconds
    const date = new Date(timestamp * 1000);

    // Extract components
    const day = date.getDate();
    const month = date.getMonth() + 1; // Months are zero-based
    const year = date.getFullYear();

    const hours = date.getHours();
    const minutes = date.getMinutes();

    // Check if it's a full date or just time
    if (day !== 1 || month !== 1 || year !== 1970) {
        return `${day}/${month < 10 ? '0' : ''}${month}/${year}, ${hours}:${minutes < 10 ? '0' : ''}${minutes}`;
    } else {
        return `${hours}:${minutes < 10 ? '0' : ''}${minutes}`;
    }
}

const displayMembersAdding = document.getElementById("addMemberBtn");
const membersForm = document.getElementById("membersForm");


const addNewMemberBtn = document.getElementById("addNewMemberBtn");

displayMembersAdding.addEventListener("click", (event) => {
    membersForm.classList.remove("hidden");
    event.stopPropagation(); // Prevent the click event from reaching the document click listener immediately
});


document.addEventListener("click", (event) => {
    console.log("clicked");
    if (!membersForm.contains(event.target) && event.target !== displayMembersAdding) {
        membersForm.classList.add("hidden");
    }
});
addNewMemberBtn.addEventListener("click", () => {
    const membersArray = $("#inviteRoomMembers").val();
    if (membersArray.length !== 0) {
        addMembers(membersArray);
    }
})

function addMembers(membersArray) {
    $.ajax({
        type: "POST",
        url: "controllers/home_controller.php",
        data: {currentRoom, membersArray},
        success: (data) => {
            membersForm.classList.add("hidden");
            displayRooms();
        }
    });
}

const roomInviteSection = document.getElementById("room-invite");
let roomInvitationId;
let roomInvitationRoomId;

function displayRoomInvitation() {

    $.ajax({
        type: "POST",
        url: "controllers/home_controller.php",
        data: {req: "displayInvite"},
        success: (data) => {
            let invitationData = JSON.parse(data);
            if (invitationData.length === 0) {
                roomInviteSection.innerHTML = '<p class="text-gray-700">invitation list is empty</p>'
            } else
                roomInviteSection.innerHTML = "";
            invitationData.forEach((invitation) => {
                roomInviteSection.innerHTML += `
                                        <div data-invitation-id="${invitation.invitation_id}" data-invitation-room-id="${invitation.room_id}" class="invite">
                                            <p class="text-gray-700">${invitation.username} invite You to Room ${invitation.room_name}</p>
                                            <div class="flex flex-row">
                                                <button type="button"
                                                        class="accept-invvitation bg-green-500 text-white px-2 py-1 rounded-md hover:bg-green-600 focus:outline-none focus:ring focus:border-green-300">
                                                    Accept
                                                </button>
                                                <button type="button"
                                                        class="reject-invvitation bg-red-500 text-white px-2 py-1 rounded-md hover:bg-red-600 focus:outline-none focus:ring focus:border-red-300">
                                                    reject
                                                </button>
                                            </div>
                                            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                                        </div>`;
            })

            let invitationElm;
            $("#room-invite").off("click", ".invite").on("click", ".invite", function () {
                roomInvitationId = $(this).data("invitation-id");
                roomInvitationRoomId = $(this).data("invitation-room-id");
                invitationElm = $(this);
            });

            const rejectBtn = document.querySelectorAll(".reject-invvitation");
            const acceptBtn = document.querySelectorAll(".accept-invvitation");


            rejectBtn.forEach((reject) => {
                $(reject).off("click").on("click", () => {
                    $.ajax({
                        type: "POST",
                        url: "controllers/home_controller.php",
                        data: {rejectRoomInvitation: true, roomInvitationId},
                        success: (data) => {
                            console.log(data);
                            $(invitationElm).remove();
                        }
                    })
                });
            });

            acceptBtn.forEach((accept) => {
                $(accept).off("click").on("click", () => {
                    console.log(roomInvitationRoomId);
                    $.ajax({
                        type: "POST",
                        url: "controllers/home_controller.php",
                        data: {acceptRoomInvitation: true, roomInvitationId, roomInvitationRoomId},
                        success: (data) => {
                            console.log(data);
                            $(invitationElm).remove();
                        }
                    })
                });
            });


        }
    });
}


function banMember(memberId) {
    $.ajax({
        type: "POST",
        url: "controllers/home_controller.php",
        data: {memberId, currentRoom, ban: true},
        success: (data) => {
            console.log(data);
            displayRoomMembers(currentRoom);
        }
    })
}

const dropdownButton = document.getElementById('dropdownBtn');
const dropdownPanel = document.getElementById('dropdown-panel');

$(dropdownButton).off("click").on("click", () => {
    dropdownPanel.classList.toggle('hidden');
    displayRoomInvitation();
});

document.addEventListener('click', (event) => {
    const target = event.target;
    const isInsideDropdown = dropdownButton.contains(target) || dropdownPanel.contains(target);
    if (!isInsideDropdown) {
        dropdownPanel.classList.add('hidden');
    }
});

let connected;

function getConnected() {
    $.ajax({
        type: "POST",
        url: "controllers/home_controller.php",
        data: {connected: true},
        success: (data) => {
            connected = data;
        }
    })
}

getConnected()