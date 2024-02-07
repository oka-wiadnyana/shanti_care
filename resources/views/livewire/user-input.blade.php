<div class="flex flex-col justify-center items-center h-dvh">
    <div class=" mb-2">
        <img class=" -ms-2" src="https://pn-negara.go.id/assets/global/images/logo/logo-pn.png" alt="">
    </div>
    <div class=" text-center text-white mb-3">
        <h1 class="text-4xl font-sans font-extrabold text-centre">SHANTI Care</h1>
        <h3 class="text-2xl">Jadikan Kami Lebih Baik!</h2>
    </div>
    <div class="w-screen p-1 md:p-2 md:w-1/2 mb-2 bg-white rounded-lg">
        
        <ol class="flex items-center w-full text-sm font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base">
            <li class="flex md:w-full items-center {{ $currentStep==1?"text-blue-600 dark:text-blue-500":"" }} sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
              
                <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                    @if ($currentStep==1)
                    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    @endif
                  
                    Data <span class=" sm:inline-flex sm:ms-2">Diri</span>
                </span>
            </li>
            <li class="flex md:w-full items-center {{ $currentStep==2?"text-blue-600 dark:text-blue-500":"" }} after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                    @if ($currentStep==2)
                    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    @endif
                    <span class="me-2">2</span>
                  
                    Keluhan/Masukan <span class=" sm:inline-flex sm:ms-2"></span>
                </span>
            </li>
            <li class="flex items-center {{ $currentStep==3?"text-blue-600 dark:text-blue-500":"" }}">
                @if ($currentStep==3)
                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                @endif
                <span class="me-2">3</span>
              
                Konfirmasi
            </li>
            <div></div>
        </ol>
    </div>
    <div class="w-screen p-2 md:p-0 md:w-1/2 shrink-0 {{ $currentStep!=1?'hidden':'' }} " x-transition>
   
        <x-card title="Data Diri">
            <x-input label="Nama" placeholder="Nama anda" wire:model="name"/>
           
           
            <x-input label="No. WA" placeholder="No WA Anda" wire:model="phone_number"/>
          
         
        
            <x-slot name="footer">
                <div class="flex justify-end items-center">
                   
                    <x-button primary label="Next" wire:click.prevent="submitFirstForm"/>
                </div>
            </x-slot>
        </x-card>
    
    </div>
    <div class="w-screen p-2 md:p-0 md:w-1/2 shrink-0 {{ $currentStep!=2?'hidden':'' }}">
   
        <x-card title="Data Keluhan/Masukan">
            <x-select
                label="Jenis "
                placeholder="Pilih"
                :options="[
                    ['name' => 'Keluhan',  'id' => 1],
                    ['name' => 'Saran Kebersihan', 'id' => 2],
                    ['name' => 'Saran Pelayanan', 'id' => 3],
                  
                ]"
                option-label="name"
                option-value="id"
                wire:model="input_type"
            />
           
            <x-textarea label="Keluhan/masukan" placeholder="write your annotations" wire:model="input"/>
            
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">Lampirkan eviden jika ada</label>
                
                <input type="file" class="block w-full text-sm text-slate-500
                  file:mr-4 file:py-2 file:px-4
                  file:rounded-full file:border-0
                  file:text-sm file:font-semibold
                  file:bg-violet-50 file:text-violet-700
                  hover:file:bg-violet-100
                " name="evidence" wire:model="evidence"/>

                @error('evidence')
                    <span class="text-red-600">{{ $message }}</span>
                @enderror
            
           
            <x-slot name="footer">
                <div class="flex justify-between items-center">
                    <x-button label="Prev" warning wire:click.prevent="prevStep"/>
                    <x-button primary label="Next" wire:click.prevent="submitSecondForm"/>
                </div>
            </x-slot>
        </x-card>
    
    </div>
    <div class="w-screen p-2 md:p-0 md:w-1/2 shrink-0 {{ $currentStep!=3?'hidden':'' }}">
   
        <x-card title="Terima kasih">
            <span>Terima Kasih Atas {{ $input_type==1?"Keluhan":"Masukan/Saran" }} Anda. {{ $input_type==1?"Keluhan":"Masukan/Saran" }} Anda akan membuat kami lebih baik kedepannya!</span>
        
            <x-slot name="footer">
                <div class="flex justify-between items-center">
                    <x-button label="Ajukan lagi" warning wire:click.prevent="toStepOne"/>
                  
                </div>
            </x-slot>
        </x-card>
    
    </div>

</div>
