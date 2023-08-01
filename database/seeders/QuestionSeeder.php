<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        $this->createModel([
            'country_id' => 'all',
            'question' => [
                'en' => 'Do I need a manual signature for documents related to transportation?',
                'uk' => 'Чи потрібен ручний підпис для документів, пов\'язаних з перевезеннями',
            ],
            'answer' => [
                'en' => 'In the logistics industry, some documents typically require a manual signature. These may include contracts, waybills, or other important documents. It is recommended to consult a legal advisor or adhere to local rules and regulations to determine which documents require a manual signature.',
                'uk' => 'Зазвичай у логістичній галузі деякі документи вимагають ручного підпису. Це можуть бути договори, накладні або інші важливі документи. Рекомендується звернутися до юридичного консультанта або дотримуватися місцевих правил і законодавства, щоб дізнатися, які документи потребують ручного підпису.',
            ],
        ])->createModel([
            'country_id' => 'all',
            'question' => [
                'en' => 'What does it mean to subscribe to a marketplace, and how does it affect carriers',
                'uk' => 'Що означає підписка на біржу і як це впливає на перевізників?',
            ],
            'answer' => [
                'en' => 'Subscribing to a marketplace is the process by which a carrier registers on a platform specializing in facilitating collaboration between carriers and transportation service requesters. This allows carriers to gain access to a wider range of transportation opportunities and improves their chances of acquiring new clients and contracts.',
                'uk' => 'Підписка на біржу є процесом, коли перевізник реєструється на платформі біржі, що спеціалізується на забезпеченні співпраці між перевізниками та замовниками перевезень. Це дозволяє перевізникам мати доступ до більшої кількості перевезень та покращує їх можливості для отримання нових клієнтів і контрактів.',
            ],
        ])->createModel([
            'country_id' => 'all',
            'question' => [
                'en' => 'How does electronic document signing work, and is it acceptable for Cargofy?',
                'uk' => 'Як працює електронний підпис документів і чи є він прийнятним для "Cargofy"?',
            ],
            'answer' => [
                'en' => 'Electronic document signing involves digitally representing a physical signature and is used to verify the authenticity of documents. We support the use of electronic document signing for convenience and efficient processing.',
                'uk' => 'Електронний підпис документів є цифровим відображенням фізичного підпису і використовується для підтвердження автентичності документів.. Ми підтримуємо використання електронного підпису для зручності і швидкості обробки документів.',
            ],
        ])->createModel([
            'country_id' => 'all',
            'question' => [
                'en' => 'How can I register as a carrier on Cargofy?',
                'uk' => 'Як можу зареєструватися в якості перевізника в "Cargofy"?',
            ],
            'answer' => [
                'en' => 'To register as a carrier on Cargofy, visit our website and fill out the registration form. Our representative will then contact you for further processing of your application.',
                'uk' => 'Для реєстрації в якості перевізника відвідайте наш веб-сайт і заповніть форму реєстрації. Після цього наш представник зв\'яжеться з вами для подальшої обробки вашої заявки.',
            ],
        ])->createModel([
            'country_id' => 'all',
            'question' => [
                'en' => 'What are the requirements for my vehicle?',
                'uk' => 'Які вимоги є до мого транспортного засобу?',
            ],
            'answer' => [
                'en' => 'We accept various types of vehicles, such as trucks, vans, cargo vehicles, etc. However, your vehicle should be in good working condition and possess the necessary permits and insurance.',
                'uk' => 'Ми приймаємо різні типи транспортних засобів, такі як вантажівки, фургони, вантажні автомобілі тощо. Однак, ваш транспортний засіб повинен бути в хорошому технічному стані, мати необхідні дозволи та страховку.',
            ],
        ])->createModel([
            'country_id' => 'all',
            'question' => [
                'en' => 'How can I find information about available shipments?',
                'uk' => 'Як можу отримати інформацію про доступні перевезення?',
            ],
            'answer' => [
                'en' => 'We send notifications about available shipments to our registered carriers through our platform or mobile app. You can also contact our logistics department to inquire about available loads.',
                'uk' => 'Ми надсилаємо повідомлення про доступні перевезення нашим зареєстрованим перевізникам за допомогою нашої платформи або мобільного додатку. Ви також можете зв\'язатися з нашим відділом логістики, щоб дізнатися про доступні завантаження.',
            ],
        ])->createModel([
            'country_id' => 'all',
            'question' => [
                'en' => 'How are transportation rates determined?',
                'uk' => 'Як встановлюються тарифи за перевезення?',
            ],
            'answer' => [
                'en' => 'Transportation rates are determined based on various factors, including distance, type of cargo, type of vehicle, and client requirements. Detailed information regarding rates will be provided to you upon receiving a shipment.',
                'uk' => 'Тарифи за перевезення встановлюються на основі різних факторів, таких як відстань, тип вантажу, тип транспортного засобу та інші вимоги клієнта. Детальна інформація про тарифи надається вам при надходженні вантажу.',
            ],
        ])->createModel([
            'country_id' => 'all',
            'question' => [
                'en' => 'What payment methods are available for carriers?',
                'uk' => 'Які способи оплати доступні для перевізників?',
            ],
            'answer' => [
                'en' => 'We offer various payment methods for our carriers, including bank transfers with or without VAT and cash payments.',
                'uk' => 'Ми пропонуємо різні способи оплати для наших перевізників, включаючи безготівковий переказ як з ПДВ так і без ПДВ, оплата готівкою.',
            ],
        ])->createModel([
            'country_id' => 'all',
            'question' => [
                'en' => 'What types of cargo does Cargofy offer?',
                'uk' => 'Які вантажі Cargofy пропонує?',
            ],
            'answer' => [
                'en' => 'Cargofy offers a wide range of freight services, specializing in the transportation of oversized cargo for flatbed and refrigerated trucks. We ensure reliable and efficient delivery of various oversized cargoes, including large machinery, equipment, metal structures, and other complex shipments.',
                'uk' => 'Cargofy пропонує широкий спектр вантажних послуг, спеціалізуючись на перевезенні габаритних вантажів для тентових і рефрижераторних вантажівок. Ми забезпечуємо надійну та ефективну доставку різноманітних габаритних вантажів, включаючи великі та незвичайні вантажі, такі як великі машини, обладнання, металоконструкції та інші складні вантажі.',
            ],
        ])->createModel([
            'country_id' => 'all',
            'question' => [
                'en' => 'Is Cargofy free?',
                'uk' => 'Чи Cargofy безкоштовний?',
            ],
            'answer' => [
                'en' => 'Cargofy is not a free platform. To utilize our services, you can purchase a monthly subscription, which grants you access to order searching, document exchange through the platform, and customer support when needed. Detailed terms and pricing can be found on our website or by contacting us with inquiries.',
                'uk' => 'Cargofy не є безкоштовною платформою. Для користування нашою послугою ви можете придбати місячну підписку, яка надасть вам доступ до пошуку замовлень, обміну документами через платформу та отримання підтримки в разі потреби. Докладні умови і вартість можна знайти на нашому веб-сайті або звернутися до нас з питаннями.',
            ],
        ])->createModel([
            'country_id' => 'all',
            'question' => [
                'en' => 'How can I connect with Cargofy?',
                'uk' => 'Як підключитись до Cargofy?',
            ],
            'answer' => [
                'en' => 'To connect with Cargofy, you can choose one of the convenient methods. Visit our website and complete the onboarding registration process, or download our iOS and Android applications and register there. We also provide the option to join us through advertisements on social media. Choose the most suitable method for you and become part of Cargofy today.',
                'uk' => 'Щоб підключитись до Cargofy, ви можете обрати один зі зручних способів. Відвідайте наш веб-сайт та пройдіть реєстрацію з онбордингом, або завантажте наші додатки для iOS та Android і зареєструйтеся там. Ми також надаємо можливість приєднатись до нас через рекламу в соціальних мережах. Оберіть найзручніший для вас спосіб і станьте частиною Cargofy вже сьогодні.',
            ],
        ])->createModel([
            'country_id' => 'all',
            'question' => [
                'en' => 'How do I book cargo on Cargofy?',
                'uk' => 'Як бронювати вантажі на Cargofy?',
            ],
            'answer' => [
                'en' => 'To book cargo on Cargofy, use your personal account on the website or app. On the "Load Board," find the desired cargo and book it at the indicated price or propose your own. Additionally, you have the option to communicate with the shipper through the chat for additional information.',
                'uk' => 'Для бронювання вантажів на Cargofy використовуйте особистий кабінет на веб-сайті або додатку. На "Біржі вантажів" знайдіть потрібний вантаж і забронюйте його за вказаною ціною або запропонуйте свою. Крім того, у вас є можливість спілкуватися замовником через чат для додаткової інформації.',
            ],
        ]);
    }

    private function createModel(array $data): self
    {
        $model = Question::create([
            'country_id' => $data['country_id'],
            'question' => $data['question'],
            'answer' => $data['answer'],
        ]);
        return $this;
    }
}
