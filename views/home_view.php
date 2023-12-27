<!-- component -->
<!-- Inspired by slack ui clone https://tailwindcomponents.com/component/slack-clone-1 -->
<div class="font-sans antialiased h-screen bg-transparent flex">
    <!-- Sidebar / channel list -->
    <div class="bg-gray-900 text-purple-lighter flex-none w-24 p-6 md:block">
        <div id="myprofile" class="cursor-pointer mb-4 border-b border-gray-600 pb-2">
            <div
                    class="bg-white h-12 w-12 flex items-center justify-center text-black text-2xl font-semibold rounded-3xl mb-1 overflow-hidden">
                <img src="assets/img/<?= $user->picture ?>" class="cursor-pointer w-full h-full rounded-full ">
            </div>
        </div>

        <!--room section-->
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
    <div id="chat-content" class="hidden flex-1 flex flex-col bg-gray-700 overflow-hidden">
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
    <div id="member-list" class="bg-gray-800 text-purple-lighter flex-none w-64 pb-6 md:block" style="display: none">
        <div
                class="text-white mb-2 mt-3 px-4 flex justify-between border-b border-gray-600 py-1 shadow-xl">

            <!-- This is an example component -->
            <div id="dropDownContainer" class="hidden max-w-lg mx-auto my-4 relative">

                <!--Dropdown Button-->
                <button id="dropBtn"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center"
                        type="button" data-dropdown-toggle="dropdown">Dropdown button
                </button>

                <!-- Dropdown menu -->
                <div class="hidden absolute r-20 bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow"
                     id="dropdown">
                    <ul class="py-1" aria-labelledby="dropdown">
                        <li>
                            <p id="addMemberBtn"
                               class="cursor-pointer text-sm hover:bg-gray-300 text-gray-700 block px-12 py-2">Add
                                Member</a>
                        </li>
                        <li>
                            <p class="cursor-pointer text-sm hover:bg-gray-300 text-red-700 block px-12 py-2">Exit
                                Room</a>
                        </li>
                    </ul>
                </div>
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
         style="background: url('<?= PATH ?>assets/img/online-chat-rooms.jpg')">
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
                            <img class="h-full w-full rounded-full" src="assets/img/<?= $user->picture ?>">
                        </div>
                    </div>
                    <div class="space-x-8 flex justify-between mt-32 md:mt-0 md:justify-center">

                        <!-- Dropdown container -->
                        <div class="relative inline-block text-left">

                            <!-- Trigger button -->
                            <button type="button"
                                    class="inline-flex justify-center items-center px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300"
                                    id="dropdownBtn">
                                Room Invitations
                            </button>
                            <!-- Dropdown panel -->
                            <div class="origin-top-right z-100 right-0 mt-2 w-56 rounded-md shadow-lg  ring-1 ring-black ring-opacity-5 hidden"
                                 id="dropdown-panel">
                                <div class="relative">

                                    <!-- List of room invitations -->
                                    <div id="room-invite" class="absolute bg-white flex flex-col px-2 overflow-y-auto">



                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-20 text-center border-b pb-12">
                    <h1 class="text-4xl font-medium text-white-700">Jessica Jones,
                        <span class="font-light text-white-500">27</span>
                    </h1>
                    <p class="font-light text-white-600 mt-3">Bucharest, Romania</p>
                    <p class="mt-8 text-white-500">Solution Manager - Creative Tim Officer</p>
                    <p class="mt-2 text-white-500">University of Computer Science</p>
                </div>
            </div>
        </div>
    </div>

    <div class="absolute top-1/4 left-1/3 inline-block text-left">

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


        <!-- Members adding -->
        <div id="membersForm" class="hidden mt-2">
            <div class="bg-gray-900 text-purple-lighter p-4 rounded">
                <div class="mb-2">
                    <label for="inviteRoomMembers" class="text-white">Add New Room Members</label>
                    <select id="inviteRoomMembers" multiple name="room-members[]"
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
                    <div id="addNewMemberBtn"
                         class="w-full px-2 py-1 border border-gray-600 rounded bg-gray-600 text-white hover hover:bg-gray-800">
                        Add New Members
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/home.js"></script>
    <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>

    <script>
        const dropdownButton = document.getElementById('dropdownBtn');
        const dropdownPanel = document.getElementById('dropdown-panel');

        dropdownButton.addEventListener('click', () => {
            dropdownPanel.classList.toggle('hidden');
        });

        document.addEventListener('click', (event) => {
            const target = event.target;
            const isInsideDropdown = dropdownButton.contains(target) || dropdownPanel.contains(target);

            if (!isInsideDropdown) {
                dropdownPanel.classList.add('hidden');
            }
        });

    </script>
