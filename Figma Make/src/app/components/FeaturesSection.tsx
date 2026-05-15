import { BookOpen, TrendingUp, CheckCircle } from 'lucide-react';

const features = [
  {
    icon: BookOpen,
    title: 'Jurnal Harian Digital',
    description: 'Siswa dapat mencatat aktivitas PKL setiap hari secara digital dengan mudah dan terstruktur. Upload foto dokumentasi dan catat progress harian dengan praktis.',
  },
  {
    icon: TrendingUp,
    title: 'Monitoring Progress PKL',
    description: 'Pantau perkembangan siswa secara real-time dengan dashboard komprehensif. Visualisasi progress memudahkan evaluasi dan identifikasi area yang perlu perhatian.',
  },
  {
    icon: CheckCircle,
    title: 'Review dan Persetujuan Pembimbing',
    description: 'Pembimbing dapat memberikan feedback, menyetujui jurnal, dan berkomunikasi langsung dengan siswa melalui platform. Proses review menjadi lebih cepat dan efisien.',
  },
];

export function FeaturesSection() {
  return (
    <section id="fitur" className="py-20 px-6 bg-muted/30">
      <div className="max-w-7xl mx-auto">
        <div className="text-center mb-16 space-y-4">
          <h2 className="text-4xl font-bold text-foreground">Fitur Unggulan</h2>
          <p className="text-lg text-muted-foreground max-w-2xl mx-auto">
            Semua yang Anda butuhkan untuk monitoring PKL yang efektif dan efisien
          </p>
        </div>

        <div className="grid md:grid-cols-3 gap-8">
          {features.map((feature, index) => {
            const Icon = feature.icon;
            return (
              <div
                key={index}
                className="bg-white rounded-2xl p-8 shadow-sm hover:shadow-md transition-shadow border border-border"
              >
                <div className="w-12 h-12 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-xl flex items-center justify-center mb-6">
                  <Icon className="text-blue-600" size={24} />
                </div>
                <h3 className="text-xl font-semibold text-foreground mb-3">
                  {feature.title}
                </h3>
                <p className="text-muted-foreground leading-relaxed">
                  {feature.description}
                </p>
              </div>
            );
          })}
        </div>
      </div>
    </section>
  );
}
