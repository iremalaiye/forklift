
<p><strong>Ad Soyad:</strong> {{ $data['first_name'] }} {{ $data['last_name'] }}</p>
<p><strong>Email:</strong> {{ $data['email'] }}</p>
<p><strong>Konu:</strong> {{ $data['subject'] ?? '(Belirtilmemiş)' }}</p>
<p><strong>Mesaj:</strong></p>
<p>{{ $data['message'] }}</p>



