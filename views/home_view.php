<!-- component -->
<!-- Inspired by slack ui clone https://tailwindcomponents.com/component/slack-clone-1 -->
<div class="font-sans antialiased h-screen bg-transparent flex">
    <!-- Sidebar / channel list -->
    <div class="bg-gray-900 text-purple-lighter flex-none w-24 p-6 md:block">
        <div id="myprofile" class="cursor-pointer mb-4 border-b border-gray-600 pb-2">
            <div
                    class="bg-white h-12 w-12 flex items-center justify-center text-black text-2xl font-semibold rounded-3xl mb-1 overflow-hidden">
                <img src="https://cdn.discordapp.com/embed/avatars/0.png" alt="">
            </div>
        </div>

        <div class="overflow-y-auto h-[500px] mb-3 w-24">
            <div id="rooms-section">
            </div>
        </div>

        <div id="addRoom" class="cursor-pointer">
            <div
                    class="bg-white opacity-25 h-12 w-12 flex items-center justify-center text-black text-2xl font-semibold rounded-3xl mb-1 overflow-hidden">
                <svg class="fill-current h-10 w-10 block" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 20 20">
                    <path
                            d="M16 10c0 .553-.048 1-.601 1H11v4.399c0 .552-.447.601-1 .601-.553 0-1-.049-1-.601V11H4.601C4.049 11 4 10.553 4 10c0-.553.049-1 .601-1H9V4.601C9 4.048 9.447 4 10 4c.553 0 1 .048 1 .601V9h4.399c.553 0 .601.447.601 1z"/>
                </svg>
            </div>
        </div>
        <form
                method="post" action="index.php?page=home"
                class="rounded-lg text-red-400 cursor-pointer hover:bg-red-600 hover:text-red-200 absolute bottom-3">
            <button name="logout">
                Logout
            </button>
        </form>

    </div>

    <!-- Chat content -->
    <div id="chat-content" class="flex-1 flex flex-col bg-gray-700 overflow-hidden">
        <!-- Top bar -->
        <div class="border-b border-gray-600 flex px-6 py-2 items-center flex-none shadow-xl">
            <div class="flex flex-col">
                <h3 class="text-white mb-1 font-bold text-xl text-gray-100">
                    <span class="text-gray-400">#</span> general</h3>
            </div>
        </div>
        <!-- Chat messages -->
        <div id="chat-section" class="px-6 py-4 flex-1 overflow-y-scroll">
            <!-- A message -->

            <!-- A message -->
        </div>

        <!-- A message input -->
        <div class="pb-6 px-4 flex-none">
            <div class="flex rounded-lg overflow-hidden">
										<span class="text-3xl text-grey border-r-4 border-gray-600 bg-gray-600 p-2">
                    <svg class="h-6 w-6 block bg-gray-500 hover:bg-gray-400 cursor-pointer rounded-xl"
                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path
                                d="M16 10c0 .553-.048 1-.601 1H11v4.399c0 .552-.447.601-1 .601-.553 0-1-.049-1-.601V11H4.601C4.049 11 4 10.553 4 10c0-.553.049-1 .601-1H9V4.601C9 4.048 9.447 4 10 4c.553 0 1 .048 1 .601V9h4.399c.553 0 .601.447.601 1z"
                                fill="#FFFFFF"/></svg>
                  </span>
                <input id="message-input" type="text" class="w-full px-4 bg-gray-600" placeholder="Message"/>
            </div>
        </div>
        <!-- A message input -->
    </div>

    <!-- Members List -->
    <div id="member-list" class="bg-gray-800 text-purple-lighter flex-none w-64 pb-6 md:block">
        <div
                class="text-white mb-2 mt-3 px-4 flex justify-between border-b border-gray-600 py-1 shadow-xl">
            <div class="flex-auto">
                <h1 class="font-semibold text-xl leading-tight mb-1 truncate">My Server</h1>
            </div>
            <div>
                <svg class="arrow-gKvcEx icon-2yIBmh opacity-50 cursor-pointer" width="24"
                     height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"
                          d="M16.59 8.59004L12 13.17L7.41 8.59004L6 10L12 16L18 10L16.59 8.59004Z">
                    </path>
                </svg>
            </div>
        </div>
        <div class="mb-8">
            <div class="px-4 mb-2 text-white flex justify-between items-center">
                <div class="opacity-75 cursor-pointer">MEMBERS</div>
                <div>
                    <svg class="fill-current h-5 w-5 opacity-50 cursor-pointer"
                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                                d="M16 10c0 .553-.048 1-.601 1H11v4.399c0 .552-.447.601-1 .601-.553 0-1-.049-1-.601V11H4.601C4.049 11 4 10.553 4 10c0-.553.049-1 .601-1H9V4.601C9 4.048 9.447 4 10 4c.553 0 1 .048 1 .601V9h4.399c.553 0 .601.447.601 1z"/>
                    </svg>
                </div>
            </div>
            <div id="members-section" class="overflow-y-auto py-3 px-4 flex-col items-start text-sm">

            </div>
        </div>

    </div>


    <!-- Profile -->
    <div id="profile-section" class="hidden w-full"
         style="background: url('<?= PATH ?>assets/img/online-chat-rooms.webp')">
        <div class="z-20 mx-auto bg-gray-500 bg-opacity-50">
            <div class="p-8 shadow mt-24">
                <div class="grid grid-cols-1 md:grid-cols-3">
                    <div class="grid grid-cols-3 text-center order-last md:order-first mt-20 md:mt-0">
                        <div><p class="font-bold text-gray-700 text-xl">22</p>
                            <p class="text-gray-400">Friends</p></div>
                        <div><p class="font-bold text-gray-700 text-xl">10</p>
                            <p class="text-gray-400">Photos</p></div>
                        <div><p class="font-bold text-gray-700 text-xl">89</p>
                            <p class="text-gray-400">Comments</p></div>
                    </div>
                    <div class="relative">
                        <div class="w-48 h-48 bg-indigo-100 mx-auto rounded-full shadow-2xl absolute inset-x-0 top-0 -mt-24 flex items-center justify-center text-indigo-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                    <div class="space-x-8 flex justify-between mt-32 md:mt-0 md:justify-center">
                        <div class="text-white py-2 px-8 uppercase rounded bg-blue-400 hover:bg-blue-500 shadow hover:shadow-lg font-sm transition transform hover:-translate-y-0.5">
                            Send Friend Request
                        </div>
                        <div class="text-white py-2 px-4 uppercase rounded bg-gray-900 hover:bg-gray-800 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                            Message
                        </div>
                    </div>
                </div>
                <div class="mt-20 text-center border-b pb-12"><h1 class="text-4xl font-medium text-white-700">Jessica
                        Jones,
                        <span class="font-light text-white-500">27</span></h1>
                    <p class="font-light text-white-600 mt-3">Bucharest, Romania</p>
                    <p class="mt-8 text-white-500">Solution Manager - Creative Tim Officer</p>
                    <p class="mt-2 text-white-500">University of Computer Science</p></div>
            </div>
        </div>
    </div>

    <!-- Room Creation -->
    <div id="roomForm" class="absolute top-1/4 left-1/3 hidden mt-2">
        <div class="bg-gray-900 text-purple-lighter p-4 rounded">
            <div class="mb-2">
                <label for="roomName" class="text-white">Room Name</label>
                <input type="text" id="roomName"
                       class="w-full px-2 py-1 border border-gray-600 rounded bg-gray-600 text-white"
                       placeholder="Room Name"/>
            </div>
            <div class="mb-2">
                <label for="roomMembers" class="text-white">Room Members</label>
                <select id="roomMembers" multiple name="room-members[]"
                        class="w-full px-2 py-1 border border-gray-600 rounded bg-gray-600 text-white">
                    <?php foreach ($users as $user) {
                        if ($user["user_id"] != $_SESSION["user_id"]) {
                            ?>
                            <option value="<?= $user["user_id"] ?>"><?= $user["username"] ?></option>
                        <?php }
                    } ?>
                </select>
            </div>
            <div class="mt-8 cursor-pointer text-center">
                <div id="addRoomBtn"
                     class="w-full px-2 py-1 border border-gray-600 rounded bg-gray-600 text-white hover hover:bg-gray-800">
                    Add New Room
                </div>
            </div>
        </div>
    </div>
</div>

<script>
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
        if ($("#roomName").val())
        createRoom($("#roomName").val(), $("#roomMembers").val())
    })

    const roomsSection = document.getElementById("rooms-section");
    let defaultRoomId = 0;

    const chatInput = document.getElementById("message-input");
    let currentRoom = 0;
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
                        <div class="room cursor-pointer mb-4" data-room-id="${room.room_id}">
                            <div class="bg-white h-12 w-12 flex items-center justify-center text-black text-2xl font-semibold rounded-3xl mb-1 overflow-hidden">
                                <img src="https://cdn.discordapp.com/embed/avatars/1.png" alt="">
                            </div>
                            <div class="absolute hidden room-popup bg-white p-2 text-black text-sm font-semibold rounded shadow-md -mt-10 -ml-2">
                                ${room.room_id}
                            </div>
                        </div>
                    `;
                });

                // Add event listener after rooms are loaded
                $("#rooms-section").off("click", ".room").on("click", ".room", function () {
                    // Access the room information using the data attribute
                    const roomId = $(this).data("room-id");

                    // Now you can use roomId as needed
                    console.log("Room clicked:", roomId);
                    currentRoom = roomId;

                    displayRoomMembers(currentRoom);
                    displayChat(currentRoom);
                    console.log("zbi");
                    memberList.style.display = "";
                    chatContent.classList.remove("hidden");
                    profileSection.classList.add("hidden");
                    roomForm.classList.add("hidden");
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
                    membersSection.innerHTML += `<div class="py-4 flex border-b border-gray-600">
                        <img src="${member.picture}"
                        class="cursor-pointer w-10 h-10 rounded-3xl mr-3">
                        <span class="font-bold text-red-300 cursor-pointer hover:underline">${member.username}</span></div>`;
                })
            }
        })
    }

    const chatSection = document.getElementById("chat-section");

    function displayChat(roomId) {
        chatSection.innerHTML = "";
        $.ajax({
            type: "POST",
            url: "controllers/home_controller.php",
            data: {roomId, chat: 1},
            success: (data) => {
                let chatData = JSON.parse(data);
                chatData.forEach((message) => {
                    chatSection.innerHTML += `
                                 <div class="border-b border-gray-600 py-3 flex items-start mb-4 text-sm">
                                    <img src="https://cdn.discordapp.com/embed/avatars/3.png"
                                         class="cursor-pointer w-10 h-10 rounded-3xl mr-3">
                                    <div class="flex-1 overflow-hidden">
                                        <div>
                                            <span class="font-bold text-red-300 cursor-pointer hover:underline">${message.username}</span>
                                            <span class="font-bold text-gray-400 text-xs">09:24</span>
                                        </div>
                                        <p class="text-white leading-normal">${message.message}</p>
                                    </div>
                                </div>`;
                })
                chatSection.scrollTop = chatSection.scrollHeight;
            }
        })
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

    chatInput.addEventListener("keypress", function (event) {
        // If the user presses the "Enter" key on the keyboard
        if (event.key === "Enter") {
            writeChat(currentRoom, chatInput.value);
        }
    });

</script>
