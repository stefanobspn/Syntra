import { ArrowRight } from 'lucide-react';
import { Link } from 'react-router';
import { ImageWithFallback } from './figma/ImageWithFallback';

export function HeroSection() {
  return (
    <section className="pt-32 pb-20 px-6">
      <div className="max-w-7xl mx-auto">
        <div className="grid lg:grid-cols-2 gap-12 items-center">
          {/* Left Content */}
          <div className="space-y-6">
            <div className="inline-block px-4 py-2 bg-blue-50 border border-blue-200 rounded-full">
              <span className="text-sm text-blue-700">Platform Monitoring PKL Modern</span>
            </div>

            <h1 className="text-5xl lg:text-6xl font-bold text-foreground leading-tight">
              Platform Monitoring PKL yang Modern dan Efisien
            </h1>

            <p className="text-lg text-muted-foreground leading-relaxed">
              Kelola jurnal harian, pantau perkembangan siswa, dan tingkatkan komunikasi antara siswa dan pembimbing dalam satu platform.
            </p>

            <div className="flex flex-col sm:flex-row gap-4 pt-4">
              <Link to="/login" className="px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg hover:opacity-90 transition-opacity flex items-center justify-center gap-2">
                Mulai Sekarang
                <ArrowRight size={20} />
              </Link>
              <Link to="/login" className="px-6 py-3 bg-white border border-border text-foreground rounded-lg hover:bg-muted transition-colors">
                Login
              </Link>
            </div>
          </div>

          {/* Right Content - Dashboard Preview */}
          <div className="relative">
            <div className="rounded-2xl overflow-hidden shadow-2xl border border-border bg-white">
              <div className="bg-gradient-to-br from-blue-50 to-indigo-50 p-3 border-b border-border">
                <div className="flex gap-2">
                  <div className="w-3 h-3 rounded-full bg-red-400"></div>
                  <div className="w-3 h-3 rounded-full bg-yellow-400"></div>
                  <div className="w-3 h-3 rounded-full bg-green-400"></div>
                </div>
              </div>
              <ImageWithFallback
                src="https://images.unsplash.com/photo-1666875753105-c63a6f3bdc86?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwyfHxtb2Rlcm4lMjBkYXNoYm9hcmQlMjBpbnRlcmZhY2UlMjBhbmFseXRpY3MlMjBjaGFydHxlbnwxfHx8fDE3Nzg4MjIzNzJ8MA&ixlib=rb-4.1.0&q=80&w=1080"
                alt="Dashboard Preview"
                className="w-full h-auto"
              />
            </div>

            {/* Decorative Elements */}
            <div className="absolute -z-10 -top-10 -right-10 w-72 h-72 bg-blue-200 rounded-full blur-3xl opacity-20"></div>
            <div className="absolute -z-10 -bottom-10 -left-10 w-72 h-72 bg-indigo-200 rounded-full blur-3xl opacity-20"></div>
          </div>
        </div>
      </div>
    </section>
  );
}
