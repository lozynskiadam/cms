<?php

namespace Database\Factories;

use App\Models\File;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FileFactory extends Factory
{
    public function configure(): FileFactory
    {
        return $this->afterCreating(function(File $file) {
            $path = storage_path('app/uploads/') . $file->id;
            $data = 'iVBORw0KGgoAAAANSUhEUgAAAMgAAADICAMAAACahl6sAAAAjVBMVEUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADqhzP4AAAALnRSTlMA+Pz0BHkq4tbKu5xTCQ/lNelbHbB1X1jBrZaPB8a0iMzt0G87LCMUpX1pTEcvbTe6XgAAA0pJREFUeNrt3Idy2kAUheFd9YroYAPudhKX8/6Pl8QhlkFI4GSL1j7fC2j+0apcjWYFERERERERERERERE5Kbi9klDPz+6EUeUSmsihMOkS2kyFSTG0uRYmQSPRgSFt9ByUIQxhCEO2GMIQhmgMmawSCY1kcjkxEVL40M4v9IcMPRggh9pDMhhxoT3EhxF+S4gbk8d7DPmyIUIThjBkiyEMYYiTIQ+XNz7M8+L8RWXIeuXBFi9UFzLYwKZZS0hvR4028kFRyBiWrRSFbGBZcjikr7NfO3k4pLeTRjuGfIEQYRBDGLLFEIYwhCEMYQhDfmFIT0LK+bTyvHg6L90OGY+wVS1cDsmB2rm7ITl2nLsaMsaehZsh5Qh7qtLJkDkaxk6GTNFw5mRIhYbYyRAPDR5DjobUlIfEaIidDLFwsdc8x2+/byqFIWWFPfHaWMiFwhCxwJ5CGAspVIaIc8MvjbVMKAupS+oOUyHXq1JxiFhU2IoLI4NVTfWoOz6LPS8+G6+F2yG1Lxny7ZOERKP7TxEyiXEVfIKQwQ2A0P2QIAMAee98SI5XV4HjIT+wFbodMsdf8t7lkGcPb66C/oYEotuLD9TC3oYMlgPRZVLhPRn1NCTIkA66OhPsSoN+huQAlqVos15iX9jLkBl+y9aixXfUji8uNJgKKfDHRfCB3V7SoHchQ7/749YjDgo/FOLrD5mM8Oa7aHrycJCMPhKy1BrSvCHlreerKf1IyFh3SJBhx0rsehihVXh6yIXQHZJjz+XuZJugduLiOtRR6g6ZoeGHqJUbdElPCvGXCyE0hxQ4YCbenKFbeOSBWNMU0n0hP4qtFY6QUS9CJiMcNhevbnFU2oeQQYIW3qJed0eE9kOCDK28Qog7iRPIyHpIjg7yObrGSVLbITN08mOcKLQbUkAVGdkMGfpQJrUYMhlBodBayCCBSjKyFBJkUCu1FJJDtdBKyAzKychCSAENUvMhQx86hKZDJiNoISOzIYMEmqRGQ4IM2sxMhuTQR0b/EuLOnw8MYQhDGOLWVgkMYQjQ1xDrO9X4Qo0pLNuIFr3cybfDrVBkbrfkZi1UuUtgz+abUOgpT3yY51XThSAiIiIiIiIiIiIiIiIi+h8/AaexZTVDpEXUAAAAAElFTkSuQmCC';
            file_put_contents($path, base64_decode($data));
            $file->update([
                'checksum' => md5_file($path),
                'size' => filesize($path)
            ]);
        });
    }

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => Str::slug(fake()->text(20)) . '.png',
            'type' => 'image/png',
            'size' => 0,
            'is_private' => false,
        ];
    }

    public function private(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_private' => true,
        ]);
    }
}
