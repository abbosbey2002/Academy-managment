<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TranslationController extends Controller
{
    public function index()
    {
        $translations_en = include resource_path('lang/en/messages.php');
        $translations_uz = include resource_path('lang/uz/messages.php');
        
        return view('pages.translations.index', compact('translations_en', 'translations_uz'));
    }

    public function update(Request $request)
    {
        $translations_en = $request->input('translations.en', []);
        $translations_uz = $request->input('translations.uz', []);

        // Convert nested arrays back to the required PHP format
        $translations_en = $this->rebuildArray($translations_en);
        $translations_uz = $this->rebuildArray($translations_uz);

        // English translations update
        $en_content = "<?php\n\nreturn " . var_export($translations_en, true) . ";\n";
        File::put(resource_path('lang/en/messages.php'), $en_content);

        // Uzbek translations update
        $uz_content = "<?php\n\nreturn " . var_export($translations_uz, true) . ";\n";
        File::put(resource_path('lang/uz/messages.php'), $uz_content);

        return redirect()->route('translations.index')->with('success', 'Translations updated successfully');
    }

    private function rebuildArray(array $array)
    {
        $result = [];
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result[$key] = $this->rebuildArray($value);
            } else {
                $result[$key] = $value;
            }
        }
        return $result;
    }

    public function sidebar()
    {
        $sidebar_en = include resource_path('lang/en/sidebar.php');
        $sidebar_uz = include resource_path('lang/uz/sidebar.php');

        return view('pages.translations.sidebar', compact('sidebar_en', 'sidebar_uz'));
    }

    public function updateSidebar(Request $request)
    {
        try {
            // O'zbek va Ingliz tarjimalarini olish
            $translations = $request->input('translations', []);
            $newKeys = $request->input('new_top_level_key', []);
            $newSubKeys = $request->input('new_sub_key', []);
            $newTranslationEn = $request->input('new_translation_en', []);
            $newTranslationUz = $request->input('new_translation_uz', []);

            $sidebar_en = [];
            $sidebar_uz = [];

            // Eski kalit va tarjimalarni qayta yig'ish
            if (isset($translations['key']) && isset($translations['en']) && isset($translations['uz'])) {
                foreach ($translations['key'] as $key => $subKeys) {
                    foreach ($subKeys as $subKey => $value) {
                        $sidebar_en[$key][$subKey] = $translations['en'][$key][$subKey] ?? '';
                        $sidebar_uz[$key][$subKey] = $translations['uz'][$key][$subKey] ?? '';
                    }
                }
            }

            // Yangi kalit va subkalitlarni qo'shish
            foreach ($newKeys as $index => $newKey) {
                if (!empty($newKey)) {
                    if (!isset($sidebar_en[$newKey])) {
                        $sidebar_en[$newKey] = [];
                    }
                    if (!isset($sidebar_uz[$newKey])) {
                        $sidebar_uz[$newKey] = [];
                    }

                    // Yangi subkalitlar qo'shish
                    if (isset($newSubKeys[$newKey])) {
                        foreach ($newSubKeys[$newKey] as $subIndex => $newSubKey) {
                            $sidebar_en[$newKey][$newSubKey] = $newTranslationEn[$newKey][$subIndex] ?? '';
                            $sidebar_uz[$newKey][$newSubKey] = $newTranslationUz[$newKey][$subIndex] ?? '';
                        }
                    }
                }
            }

            // Faylni saqlash (Inglizcha)
            $en_content = "<?php\n\nreturn " . var_export($sidebar_en, true) . ";\n";
            File::put(resource_path('lang/en/sidebar.php'), $en_content);

            // Faylni saqlash (O‘zbekcha)
            $uz_content = "<?php\n\nreturn " . var_export($sidebar_uz, true) . ";\n";
            File::put(resource_path('lang/uz/sidebar.php'), $uz_content);

            // Muvaffaqiyatli saqlanganda foydalanuvchini qayta yo‘naltirish
            return redirect()->route('translations.sidebar')->with('success', 'Sidebar translations updated successfully');
        } catch (\Exception $e) {
            // Xatolik yuz berganda xabar bilan qayta yo‘naltirish
            return redirect()->route('translations.sidebar')->with('error', 'An error occurred while updating the translations: ' . $e->getMessage());
        }
    }

}
