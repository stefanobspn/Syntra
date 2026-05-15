import { Link } from 'react-router';

export function Footer() {
  return (
    <footer className="py-12 px-6 border-t border-border bg-muted/30">
      <div className="max-w-7xl mx-auto">
        <div className="flex flex-col md:flex-row justify-between items-center gap-6">
          <Link to="/" className="flex items-center gap-2">
            <div className="w-8 h-8 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-lg flex items-center justify-center">
              <span className="text-white font-bold text-lg">S</span>
            </div>
            <span className="font-semibold text-xl text-foreground">Syntra</span>
          </Link>

          <div className="text-muted-foreground text-sm">
            © 2026 Syntra. Platform Monitoring PKL Modern.
          </div>

          <div className="flex gap-6">
            <a href="#" className="text-muted-foreground hover:text-foreground transition-colors text-sm">
              Privasi
            </a>
            <a href="#" className="text-muted-foreground hover:text-foreground transition-colors text-sm">
              Syarat & Ketentuan
            </a>
            <a href="#" className="text-muted-foreground hover:text-foreground transition-colors text-sm">
              Kontak
            </a>
          </div>
        </div>
      </div>
    </footer>
  );
}
