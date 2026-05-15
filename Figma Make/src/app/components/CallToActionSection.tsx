import { ArrowRight, Sparkles } from 'lucide-react';
import { Link } from 'react-router';

export function CallToActionSection() {
  return (
    <section className="py-20 px-6">
      <div className="max-w-5xl mx-auto">
        <div className="relative overflow-hidden bg-gradient-to-br from-blue-600 to-indigo-600 rounded-3xl p-12 md:p-16">
          {/* Background Decoration */}
          <div className="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
          <div className="absolute bottom-0 left-0 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>

          <div className="relative z-10 text-center space-y-6">
            <div className="inline-flex items-center gap-2 px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full border border-white/30">
              <Sparkles className="text-white" size={16} />
              <span className="text-sm text-white font-medium">Mulai Transformasi Digital PKL</span>
            </div>

            <h2 className="text-4xl md:text-5xl font-bold text-white leading-tight">
              Siap Modernisasi Monitoring PKL Anda?
            </h2>

            <p className="text-lg md:text-xl text-blue-50 max-w-2xl mx-auto leading-relaxed">
              Bergabunglah dengan sekolah-sekolah yang telah merasakan kemudahan monitoring PKL digital dengan Syntra
            </p>

            <div className="flex flex-col sm:flex-row gap-4 justify-center pt-6">
              <Link to="/login" className="px-8 py-4 bg-white text-blue-600 rounded-lg font-semibold hover:bg-blue-50 transition-colors flex items-center justify-center gap-2 shadow-lg">
                Mulai Gratis
                <ArrowRight size={20} />
              </Link>
              <button className="px-8 py-4 bg-transparent border-2 border-white text-white rounded-lg font-semibold hover:bg-white/10 transition-colors">
                Hubungi Kami
              </button>
            </div>

            <p className="text-sm text-blue-100 pt-4">
              Tidak perlu kartu kredit • Setup dalam 5 menit • Dukungan penuh
            </p>
          </div>
        </div>
      </div>
    </section>
  );
}
