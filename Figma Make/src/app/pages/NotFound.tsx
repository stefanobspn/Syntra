import { Home } from 'lucide-react';
import { useNavigate } from 'react-router';

export function NotFound() {
  const navigate = useNavigate();

  return (
    <div className="min-h-screen bg-background flex items-center justify-center px-6">
      <div className="text-center space-y-6">
        <div className="space-y-2">
          <h1 className="text-9xl font-bold text-blue-600">404</h1>
          <h2 className="text-3xl font-semibold text-foreground">Halaman Tidak Ditemukan</h2>
          <p className="text-lg text-muted-foreground">
            Maaf, halaman yang Anda cari tidak tersedia.
          </p>
        </div>

        <button
          onClick={() => navigate('/')}
          className="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg hover:opacity-90 transition-opacity"
        >
          <Home size={20} />
          Kembali ke Beranda
        </button>
      </div>
    </div>
  );
}
